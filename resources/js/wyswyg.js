import "https://cdn.tiny.cloud/1/s8googw8n9fva3do0982r0f6ltgvwmr42p68pt5o8kerc7qi/tinymce/6/tinymce.min.js";

console.log("AA");

tinymce.init({
    selector: "textarea#content",
    placeholder: "Type here...",
    // skin: "jam",
    // icons: "jam",
    toolbar_sticky: true,
    toolbar_sticky_offset: 70,
    content_style:
        "@import url('https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');",
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
        "advlist accordion autolink autoresize anchor charmap code codesample directionality emoticons importcss insertdatetime image link lists media nonbreaking searchreplace table help visualblocks preview visualchars quickbars wordcount",
    toolbar: [
        "help print searchreplace | accordion accordionremove | undo redo removeformat | blocks fontfamily  fontsizeinput lineheight | bold italic underline strikethrough subscript superscript blockquote | forecolor backcolor | Flmngr ImgPen Image quickimage media link | alignleft aligncenter alignright alignjustify bullist numlist | lineheight outdent indent | charmap emoticons language | table pagebreak anchor visualchars codesample code tiny_mce_wiris_formulaEditor tiny_mce_wiris_formulaEditorChemistry preview | ",
    ],
    font_family_formats:
        "Andale Mono=andale mono,times; Arial=arial,helvetica,sans-serif; Arial Black=arial black,avant garde; Book Antiqua=book antiqua,palatino; Comic Sans MS=comic sans ms,sans-serif; Courier New=courier new,courier; Georgia=georgia,palatino; Helvetica=helvetica; Impact=impact,chicago; Oswald=oswald; Symbol=symbol; Tahoma=tahoma,arial,helvetica,sans-serif; Terminal=terminal,monaco; Times New Roman=times new roman,times; Trebuchet MS=trebuchet ms,geneva; Verdana=verdana,geneva; Lato=Lato,sans-serif; Poppins=Poppins,sans-serif;",
    Flmngr: {
        apiKey: "lvnWvPy5", // See in Dashboard:  https://flmngr.com/dashboard
    },
    link_context_toolbar: true,
    quickbars_insert_toolbar: "quicktable hr image media codesample",
    quickbars_selection_toolbar:
        "bold italic underline removeformat | blocks | bullist numlist | blockquote quicklink",
    quickbars_image_toolbar:
        "rotateleft rotateright | flipv fliph |  imageoptions ",
    contextmenu: " inserttable | cell row column deletetable | help",
    codesample_languages: [
        { text: "HTML/XML", value: "markup" },
        { text: "JavaScript", value: "javascript" },
        { text: "TypeScript", value: "typescript" },
        { text: "CSS", value: "css" },
        { text: "PHP", value: "php" },
        { text: "Ruby", value: "ruby" },
        { text: "Python", value: "python" },
        { text: "Java", value: "java" },
        { text: "C", value: "c" },
        { text: "C#", value: "csharp" },
        { text: "C++", value: "cpp" },
        { text: "F#", value: "fsharp" },
        { text: "Json", value: "json" },
        { text: "SQL", value: "sql" },
        { text: "Go", value: "go" },
    ],
    content_style:
        "body { font-family:Lato,Helvetica,Arial,sans-serif; font-size:16px }",
    mobile: {
        menubar: false,
    },
    setup: function (editor) {
        editor.on("change", function () {
            editor.save(); // Save content to textarea
        });
    },
});
