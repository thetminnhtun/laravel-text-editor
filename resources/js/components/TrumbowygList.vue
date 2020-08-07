<template>
    <div class="container mt-3">
        <div class="row">
            <div class="col-12 mb-3">
                <button class="btn btn-primary" @click="create">
                    <i class="fas fa-plus-circle mr-1"></i>Create
                </button>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title mb-0">Posts</h3>
                        <div class="card-tools">
                            <form @submit.prevent="search">
                                <div class="input-group input-group-sm">
                                    <input
                                        type="text"
                                        v-model="post.title"
                                        class="form-control float-right"
                                        placeholder="Search"
                                    />

                                    <div class="input-group-append">
                                        <button
                                            type="submit"
                                            class="btn btn-default"
                                        >
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table text-nowrap table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Date</th>
                                    <th width="200">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="post in posts.data" :key="post.id">
                                    <td>{{ post.id }}</td>
                                    <td>
                                        <a
                                            href="javascript:void(0)"
                                            @click="show(post)"
                                            class="btn btn-link"
                                        >
                                            {{ post.title }}
                                        </a>
                                    </td>
                                    <td>{{ post.created_at }}</td>
                                    <td>
                                        <button
                                            @click="show(post)"
                                            class="btn btn-info btn-sm"
                                        >
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button
                                            @click="edit(post)"
                                            class="btn btn-success btn-sm"
                                        >
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button
                                            @click="destroy(post)"
                                            class="btn btn-danger btn-sm"
                                        >
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer"></div>
                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <TrumbowygForm :editMode="editMode" :post="post"></TrumbowygForm>
        <TrumbowygShow :post="post"></TrumbowygShow>
    </div>
</template>

<script>
import TrumbowygForm from "./TrumbowygForm";
import TrumbowygShow from "./TrumbowygShow";

export default {
    components: {
        TrumbowygForm,
        TrumbowygShow
    },
    data() {
        return {
            posts: [],
            post: {
                title: "",
                content: ""
            },
            editMode: false
        };
    },
    methods: {
        search() {
            axios
                .get(`api/post/?search=${this.post.title}`)
                .then(res => (this.posts = res.data))
                .catch(err => console.log(err));
        },
        getPosts() {
            axios
                .get("api/post")
                .then(res => (this.posts = res.data))
                .catch(err => console.log(err));
        },
        show(post) {
            this.post = post;
            $("#tb-show").modal("show");
        },
        create() {
            this.editMode = false;
            this.post = { title: "", content: "" };
            this.$emit('open-form');
            $("#tb-form").modal("show");
        },
        edit(post) {
            this.editMode = true;
            this.post = post;
            $("#tb-form").modal("show");
        },
        destroy(post) {
            if (confirm(`Are you sure to delete ${post.title}?`)) {
                axios
                    .delete("api/post/" + post.id)
                    .then(res => this.getPosts())
                    .catch(err => console.log(err));
            }
        }
    },
    created() {
        this.getPosts();
        this.$on("posts-reload", payload => this.getPosts());
    }
};
</script>

<style></style>
