<template>
    <!-- Modal -->
    <div class="modal fade" id="tb-form" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        {{ editMode ? "Edit Post" : "Create Post" }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" @click="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form @submit.prevent="save">
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input
                                    type="text"
                                    v-model="post.title"
                                    id="title"
                                    class="form-control"
                                    :class="{ 'is-invalid': errors['title'] }"
                                    autofocus
                                />
                                <span
                                    class="invalid-feedback"
                                    v-if="errors['title']"
                                >
                                    {{ errors["title"][0] }}
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="content">Content</label>
                                <trumbowyg
                                    v-model="post.content"
                                    :config="config"
                                    class="form-control"
                                    name="content"
                                    id="content"
                                ></trumbowyg>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button
                            type="button"
                            class="btn btn-secondary"
                            data-dismiss="modal"
                            @click="close"
                        >
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save mr-1"></i> Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<style>
.trumbowyg-modal-box label input {
    line-height: 19px;
}
</style>

<script>
// Import Trumbowyg JS
import Trumbowyg from "vue-trumbowyg";
import config from "../config/trumbowyg";

export default {
    props: ["post", "editMode"],
    data() {
        return {
            config: config,
            errors: {}
        };
    },
    components: {
        Trumbowyg
    },
    methods: {
        store() {
            axios
                .post("/api/post", {
                    title: this.post.title,
                    content: this.post.content
                })
                .then(res => {
                    $("#tb-form").modal("hide");
                    this.$emit("posts-reload");
                    this.errors = {};
                })
                .catch(err => (this.errors = err.response.data.errors))
        },
        update() {
            axios
                .put(`/api/post/${this.post.id}`, {
                    title: this.post.title,
                    content: this.post.content
                })
                .then(res => {
                    $("#tb-form").modal("hide");
                    this.$emit("posts-reload");
                    this.errors = {};
                })
                .catch(err => (this.errors = err.response.data.errors))
        },
        save() {
            this.editMode ? this.update() : this.store();
        },
        close() {
            this.errors = {}
        }
    }
};
</script>
