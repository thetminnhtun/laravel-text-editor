<template>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit Post</div>

                    <form @submit.prevent="save">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input
                                    type="text"
                                    v-model="title"
                                    id="title"
                                    class="form-control"
                                />
                            </div>
                            <div class="form-group">
                                <label for="content">Content</label>
                                <trumbowyg
                                    v-model="content"
                                    :config="config"
                                    class="form-control"
                                    name="content"
                                    id="content"
                                ></trumbowyg>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-save mr-1"></i> Save
                            </button>
                            <a href="/trumbowyg" class="btn btn-default float-right"
                                >Cancel</a
                            >
                        </div>
                    </form>
                </div>
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
import Trumbowyg from "vue-trumbowyg";
// Import Trumbowyg CSS
import "trumbowyg/dist/ui/trumbowyg.css";
// Import Trumbowyg Plugins
import "trumbowyg/dist/plugins/base64/trumbowyg.base64.min.js";
import "../plugins/jquery-resizable.min.js";
import "trumbowyg/dist/plugins/resizimg/trumbowyg.resizimg.min.js";
import "trumbowyg/dist/plugins/table/ui/trumbowyg.table.min.css";
import "trumbowyg/dist/plugins/table/trumbowyg.table.min.js";
import "trumbowyg/dist/plugins/pasteembed/trumbowyg.pasteembed.min.js";

export default {
    data() {
        return {
            title: null,
            content: null,
            config: {
                plugins: {
                    resizimg: {
                        minSize: 64,
                        step: 16
                    },
                    table: {
                        // Some table plugin options, see details below
                    }
                },
                btns: [
                    ["viewHTML"],
                    ["undo", "redo"], // Only supported in Blink browsers
                    ["formatting"],
                    ["strong", "em", "del"],
                    ["superscript", "subscript"],
                    ["link"],
                    ["insertImage"],
                    ["base64"],
                    ["table"],
                    ["pasteembed"],
                    [
                        "justifyLeft",
                        "justifyCenter",
                        "justifyRight",
                        "justifyFull"
                    ],
                    ["unorderedList", "orderedList"],
                    ["horizontalRule"],
                    ["removeformat"],
                    ["fullscreen"]
                ]
                // Get options from
                // https://alex-d.github.io/Trumbowyg/documentation
            }
        };
    },
    components: {
        Trumbowyg
    },
    methods: {
        save() {
            axios.post(`/trumbowyg`, {
                title: this.title,
                content: this.content
            })
            .then(res => window.location.replace('/trumbowyg'))
            .catch(err => console.log(err))
        }
    }
};
</script>
