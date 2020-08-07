// Import Trumbowyg CSS
import "trumbowyg/dist/ui/trumbowyg.css";
// Import Trumbowyg base64 Plugins
import "trumbowyg/dist/plugins/base64/trumbowyg.base64.min.js";
// Import Trumbowyg resizimg Plugins
import "jquery-resizable-dom/dist/jquery-resizable.min.js";
import "trumbowyg/dist/plugins/resizimg/trumbowyg.resizimg.min.js";
// Import Trumbowyg table(CSS, JS) Plugins
import "trumbowyg/dist/plugins/table/ui/trumbowyg.table.min.css";
import "trumbowyg/dist/plugins/table/trumbowyg.table.min.js";
// Import Trumbowyg pasteembed Plugins
import "trumbowyg/dist/plugins/pasteembed/trumbowyg.pasteembed.min.js";
// Import Trumbowyg noembed(Youtube) Plugins
import "trumbowyg/dist/plugins/noembed/trumbowyg.noembed.js";
// Import Trumbowyg template Plugins
import "trumbowyg/dist/plugins/template/trumbowyg.template.min.js";
// Import Trumbowyg pasteimage Plugins
import "trumbowyg/dist/plugins/pasteimage/trumbowyg.pasteimage.min.js";
// Import Trumbowyg Text colors and Background colors Plugins
import "trumbowyg/dist/plugins/colors/ui/trumbowyg.colors.min.css";
import "trumbowyg/dist/plugins/colors/trumbowyg.colors.min.js";

export default {
    // imageWidthModalEdit: true,
    plugins: {
        resizimg: {
            minSize: 64,
            step: 16
        },
        table: {
            // Some table plugin options, see details below
        },
        templates: [
            {
                name: 'Template 1',
                html: `<!--?xml encoding="UTF-8"--><p><span style="margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;">Lorem Ipsum</span><span style="color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;">&nbsp;is simply dummy</span><br></p><ul><li><span style="margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;">Lorem Ipsum</span><span style="color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;">&nbsp;is simply dummy</span><br></li><li><span style="color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;">Lorem Ipsum&nbsp;is simply dummy<br></span></li><li><span style="color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;">Lorem Ipsum&nbsp;is simply dummy<br></span></li><li><span style="color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;">Lorem Ipsum&nbsp;is simply dummy<br></span></li><li><span style="color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;">Lorem Ipsum&nbsp;is simply dummy<br></span></li></ul><p style="text-align: justify;"><span style="color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.</span><span style="color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.</span><span style="margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;">Lorem Ipsum</span><span style="color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;">&nbsp;is simply dummy</span></p><h1><hr></h1><h1>Heading1</h1><p><hr></p><p><span style="color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here',</span><br></p><h3>Heading2</h3><h3 style="font-family: Nunito, sans-serif; color: rgb(33, 37, 41);"><span style="color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here',</span><span style="color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here',</span><span style="color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here',</span><span style="color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here',</span></h3><h3 style="font-family: Nunito, sans-serif; color: rgb(33, 37, 41);"><span style="color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;"><br><p style="text-align: center;"><img src="https://via.placeholder.com/800x200" alt="" width="978" height="246"></p></span><br></h3><h3 style="font-family: Nunito, sans-serif; color: rgb(33, 37, 41);">Heading3</h3><p><span style="color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here',</span><span style="color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here',</span><span style="color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here',</span><span style="color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here',</span><br></p><p style="text-align: center; "><iframe width=" 480" height="270" src="https://www.youtube.com/embed/668nUCeBHyY?feature=oembed" frameborder="0" allowfullscreen="allowfullscreen"></iframe>&nbsp;<br></p>
`
            },
        ]
    },
    btnsDef: {
        // image: {
        //     dropdown: ['insertImage', 'base64', "noembed"],
        //     ico: 'insertImage'
        // }
    },
    btns: [
        ["viewHTML"],
        ["template"],
        ["undo", "redo"], // Only supported in Blink browsers
        ["formatting"],
        ["strong", "em", "del"],
        ['foreColor', 'backColor'],
        // ["superscript", "subscript"],
        ["link"],
        // ["image"],
        ['insertImage', 'base64', "noembed"],
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
};