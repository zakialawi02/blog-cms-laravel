import "https://cdn.tiny.cloud/1/s8googw8n9fva3do0982r0f6ltgvwmr42p68pt5o8kerc7qi/tinymce/6/tinymce.min.js";

console.log("AA");

tinymce.init({
    selector: "textarea#content",
    placeholder: "Type here...",
    // skin: "jam",
    // icons: "jam",
    toolbar_sticky: true,
    toolbar_sticky_offset: 70,
    width: "100%",
    min_height: 500,
    advcode_inline: true,
    spellchecker_language: "en",
    external_plugins: {
        tiny_mce_wiris: `https://cdn.jsdelivr.net/npm/@wiris/mathtype-tinymce6@8.9.0/plugin.min.js`,
    },
    draggable_modal: true,
    extended_valid_elements: "*[.*]",
    plugins:
        "advlist advcode accordion autolink autoresize anchor casechange charmap code codesample directionality emoticons importcss insertdatetime image editimage link lists media nonbreaking searchreplace tinymcespellchecker table tableofcontents help visualblocks preview visualchars quickbars powerpaste wordcount",
    toolbar: [
        "help print tableofcontents searchreplace | accordion accordionremove | undo redo removeformat | blocks fontfamily  fontsizeinput lineheight | bold italic underline strikethrough subscript superscript casechange blockquote | forecolor backcolor | Flmngr ImgPen Image quickimage media link | alignleft aligncenter alignright alignjustify bullist numlist | lineheight outdent indent | charmap emoticons spellchecker language spellcheckdialog | table pagebreak anchor visualchars codesample code tiny_mce_wiris_formulaEditor tiny_mce_wiris_formulaEditorChemistry preview | ",
    ],
    Flmngr: {
        apiKey: "lvnWvPy5", // See in Dashboard:  https://flmngr.com/dashboard
    },
    link_context_toolbar: true,
    quickbars_insert_toolbar: "quicktable hr image media codesample",
    quickbars_selection_toolbar:
        "bold italic underline removeformat | blocks | bullist numlist | blockquote quicklink | spellcheckdialog",
    quickbars_image_toolbar:
        "rotateleft rotateright | flipv fliph | editimage imageoptions ",
    contextmenu: " inserttable | cell row column deletetable | help",

    content_style:
        "body { font-family:Helvetica,Arial,sans-serif; font-size:16px }",
    mobile: {
        menubar: false,
    },
    setup: function (editor) {
        editor.on("change", function () {
            editor.save(); // Save content to textarea
        });
    },
});
