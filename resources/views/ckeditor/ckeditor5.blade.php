<script src="https://cdn.ckeditor.com/ckeditor5/43.1.0/ckeditor5.umd.js"></script>
<script>
    const {
        ClassicEditor,
        Autoformat,
        TextTransformation,
        Essentials,
        PasteFromMarkdownExperimental,
        RemoveFormat,
        Bold,
        Code,
        Italic,
        Strikethrough,
        Subscript,
        Superscript,
        Underline,
        SpecialCharacters,
        SpecialCharactersEssentials,
        Heading,
        Font,
        List,
        TodoList,
        Alignment,
        Paragraph,
        Link,
        Image,
        ImageInsert,
        ImageToolbar,
        ImageCaption,
        ImageStyle,
        ImageResize,
        LinkImage,
        Table,
        MediaEmbed,
        CodeBlock,
        BlockQuote,
        TableCellProperties,
        TableProperties,
        TableToolbar,
        PasteFromOffice,
        Base64UploadAdapter
    } = CKEDITOR;

    document.querySelectorAll('textarea').forEach(textarea => {
        CKEDITOR.ClassicEditor.create(textarea, {
            plugins: [
                ClassicEditor, Autoformat, TextTransformation,
                Essentials, PasteFromMarkdownExperimental, RemoveFormat,
                Bold, Code, Italic, Strikethrough, Subscript, Superscript, Underline,
                SpecialCharacters, SpecialCharactersEssentials,
                Heading,
                Font,
                List, TodoList,
                Alignment, Paragraph,
                Link,
                Image, ImageInsert, ImageToolbar, ImageCaption, ImageStyle, ImageResize, LinkImage,
                Table,
                MediaEmbed,
                CodeBlock,
                BlockQuote,
                TableToolbar, TableProperties, TableCellProperties,
                PasteFromOffice,
                Base64UploadAdapter
            ],
            toolbar: {
                items: [
                    'undo', 'redo', '|',
                    'findAndReplace', 'selectAll', '|',
                    'heading', '|',
                    'bold', 'italic', 'strikethrough', 'underline', '|',
                    'alignment', 'bulletedList', 'numberedList', 'todoList', '|',
                    'subscript', 'superscript', 'removeFormat', 'specialCharacters', '|',
                    'code',
                    '-',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                    'insertImage', 'imageStyle:block', 'imageStyle:side', '|',
                    'toggleImageCaption', 'imageTextAlternative', 'ckboxImageEdit', '|', 'linkImage',
                    'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
                    'horizontalLine', 'pageBreak', '|',
                    'sourceEditing'
                ],
                shouldNotGroupWhenFull: true
            },
            list: {
                properties: {
                    styles: true,
                    startIndex: true,
                    reversed: true
                }
            },
            heading: {
                options: [{
                        model: 'paragraph',
                        title: 'Paragraph',
                        class: 'ck-heading_paragraph'
                    },
                    {
                        model: 'heading1',
                        view: 'h1',
                        title: 'Heading 1',
                        class: 'ck-heading_heading1'
                    },
                    {
                        model: 'heading2',
                        view: 'h2',
                        title: 'Heading 2',
                        class: 'ck-heading_heading2'
                    },
                    {
                        model: 'heading3',
                        view: 'h3',
                        title: 'Heading 3',
                        class: 'ck-heading_heading3'
                    },
                    {
                        model: 'heading4',
                        view: 'h4',
                        title: 'Heading 4',
                        class: 'ck-heading_heading4'
                    },
                    {
                        model: 'heading5',
                        view: 'h5',
                        title: 'Heading 5',
                        class: 'ck-heading_heading5'
                    },
                    {
                        model: 'heading6',
                        view: 'h6',
                        title: 'Heading 6',
                        class: 'ck-heading_heading6'
                    }
                ]
            },
            placeholder: 'Description',
            fontFamily: {
                options: [
                    'Montserrat, sans-serif',
                    'Arial, Helvetica, sans-serif',
                    'Courier New, Courier, monospace',
                    'Georgia, serif',
                    'Lucida Sans Unicode, Lucida Grande, sans-serif',
                    'Tahoma, Geneva, sans-serif',
                    'Times New Roman, Times, serif',
                    'Trebuchet MS, Helvetica, sans-serif',
                    'Verdana, Geneva, sans-serif'
                ],
                supportAllValues: true
            },
            fontSize: {
                options: ['12px', '14px', '16px', '18px', '20px', '22px', '24px'],
                supportAllValues: true
            },
            htmlSupport: {
                allow: [{
                    name: /.*/,
                    attributes: true,
                    classes: true,
                    styles: true
                }]
            },
            htmlEmbed: {
                showPreviews: true
            },
            link: {
                decorators: {
                    addTargetToExternalLinks: true,
                    defaultProtocol: 'https://',
                    toggleDownloadable: {
                        mode: 'manual',
                        label: 'Downloadable',
                        attributes: {
                            download: 'file'
                        }
                    }
                }
            },
            removePlugins: [
                'AIAssistant',
                'CKBox',
                'CKFinder',
                'EasyImage',
                'MultiLevelList',
                'RealTimeCollaborativeComments',
                'RealTimeCollaborativeTrackChanges',
                'RealTimeCollaborativeRevisionHistory',
                'PresenceList',
                'Comments',
                'TrackChanges',
                'TrackChangesData',
                'RevisionHistory',
                'Pagination',
                'WProofreader',
                'MathType',
                'SlashCommand',
                'Template',
                'DocumentOutline',
                'FormatPainter',
                'TableOfContents',
                'PasteFromOfficeEnhanced',
                'CaseChange'
            ]
        }).catch(error => {
            console.error(error);
        });
    });
</script>
