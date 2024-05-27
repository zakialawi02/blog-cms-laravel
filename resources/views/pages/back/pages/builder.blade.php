<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <meta name="robots" content="noindex, nofollow">

        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

        <!-- grapesjs -->
        <link href="https://unpkg.com/grapesjs/dist/css/grapes.min.css" rel="stylesheet">
        <script src="https://unpkg.com/grapesjs"></script>
        <script src="https://unpkg.com/grapesjs-blocks-basic"></script>
        <script src="https://unpkg.com/grapesjs-blocks-flexbox"></script>
        <script src="https://unpkg.com/grapesjs-navbar"></script>
        <script src="https://unpkg.com/grapesjs-style-gradient"></script>
        <script src="https://unpkg.com/grapesjs-component-countdown"></script>
        <script src="https://unpkg.com/grapesjs-plugin-forms"></script>
        <script src="https://unpkg.com/grapesjs-style-filter"></script>
        <script src="https://unpkg.com/grapesjs-tabs"></script>
        <script src="https://unpkg.com/grapesjs-tooltip"></script>
        <script src="https://unpkg.com/grapesjs-custom-code"></script>
        <script src="https://unpkg.com/grapesjs-touch"></script>
        <script src="https://unpkg.com/grapesjs-parser-postcss"></script>
        <script src="https://unpkg.com/grapesjs-typed"></script>
        <script src="https://unpkg.com/grapesjs-style-bg"></script>
        <script src="https://unpkg.com/grapesjs-tui-image-editor"></script>
        <script src="https://unpkg.com/grapesjs-ui-suggest-classes"></script>
        <script src="https://unpkg.com/grapesjs-tailwind"></script>
        <script src="https://unpkg.com/grapesjs-preset-webpage@1.0.2"></script>

        <style>
            .lc {
                display: flex;
                justify-content: center;
                align-items: center;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgb(232, 232, 232);
                z-index: 9999;
            }

            .spn {
                width: 50px;
                padding: 8px;
                aspect-ratio: 1;
                border-radius: 50%;
                background: #196cca;
                --_m:
                    conic-gradient(#0000 10%, #000),
                    linear-gradient(#000 0 0) content-box;
                -webkit-mask: var(--_m);
                mask: var(--_m);
                -webkit-mask-composite: source-out;
                mask-composite: subtract;
                animation: s3 1s infinite linear;
            }

            @keyframes s3 {
                to {
                    transform: rotate(1turn)
                }
            }
        </style>

        <style>
            body,
            html {
                margin: 0;
                height: 100%;
            }

            .change-theme-button {
                width: 40px;
                height: 40px;
                border-radius: 50%;
                margin: 5px;
            }

            .change-theme-button:focus {
                /* background-color: yellow; */
                outline: none;
                box-shadow: 0 0 0 2pt #c5c5c575;
            }
        </style>

        <!-- Scripts -->
        @vite(["resources/css/app.css", "resources/js/app.js"])
        <script src="https://cdn.tailwindcss.com"></script>
        @if ($page->isFullWidth == 1)
            @vite(["resources/css/app-tailwind.css"])
        @endif

        <title>{{ $page->title }}</title>
    </head>

    <body>

        <!-- Loader -->
        <div id="lspn" class="lc">
            <div class="spn"></div>
        </div>


        <div id="gjs">

        </div>
        <div id="blocks"></div>

        <style>
            /* Theming */

            /* Primary color for the background */
            .gjs-one-bg {
                background-color: #404040;
            }

            /* Secondary color for the text color */
            .gjs-two-color {
                color: rgba(255, 255, 255, 0.907);
            }

            /* Tertiary color for the background */
            .gjs-three-bg {
                background-color: #4b4b4b;
                color: white;
            }

            /* Quaternary color for the text color */
            .gjs-four-color,
            .gjs-four-color-h:hover {
                color: #616985;
            }
        </style>

        <script type="text/javascript">
            const escapeName = (name) => `${name}`.trim().replace(/([^a-z0-9\w-:/]+)/gi, '-');
            const projectId = '{{ $page->id }}';
            const loadProjectEndpoint = `{{ url('/admin/pages/${projectId}/load-project') }}`;
            const storeProjectEndpoint = `{{ url('/admin/pages/${projectId}/store-project') }}`;

            const username = `{{ Auth::user()->username }}`;
            var lp = `/storage/app/drive/${username}/img/`;
            var plp = 'https://via.placeholder.com/350x250/';
            var images = [
                plp + '78c5d6/fff',
                plp + '459ba8/fff',
                plp + '79c267/fff',
                plp + 'c5d647/fff',
                plp + 'f28c33/fff',
                plp + 'e868a2/fff',
                plp + 'cc4360/fff',
                lp + 'work-desk.jpg',
                lp + 'phone-app.png',
                lp + 'bg-gr-v.png'
            ];

            const editor = grapesjs.init({
                container: '#gjs',
                height: '100%',
                fromElement: true,
                selectorManager: {
                    componentFirst: true,
                    escapeName,
                },
                showOffsets: true,
                assetManager: {
                    embedAsBase64: true,
                    assets: images,
                },
                storageManager: {
                    type: 'remote',
                    stepsBeforeSave: 1,
                    options: {
                        remote: {
                            urlLoad: loadProjectEndpoint,
                            urlStore: storeProjectEndpoint,
                            fetchOptions: opts => (opts.method === 'POST' ? {
                                method: 'PATCH'
                            } : {}),
                            onStore: data => ({
                                _token: '{{ csrf_token() }}',
                                id: projectId,
                                data
                            }),
                            onLoad: result => result.data,
                        }
                    }
                },

                plugins: [
                    'gjs-blocks-basic',
                    'grapesjs-plugin-forms',
                    'grapesjs-component-countdown',
                    'grapesjs-tabs',
                    'grapesjs-custom-code',
                    'grapesjs-touch',
                    'grapesjs-navbar',
                    'grapesjs-style-gradient',
                    'grapesjs-parser-postcss',
                    'grapesjs-tooltip',
                    'grapesjs-tui-image-editor',
                    'grapesjs-typed',
                    'grapesjs-style-bg',
                    'grapesjs-ui-suggest-classes',
                    'grapesjs-style-filter',
                    'grapesjs-tailwind',
                    'grapesjs-preset-webpage',
                ],
                pluginsOpts: {
                    'gjs-blocks-basic': {
                        flexGrid: true
                    },
                    'grapesjs-tui-image-editor': {
                        config: {
                            includeUI: {
                                initMenu: 'filter',
                            },
                        },
                    },
                    'grapesjs-tabs': {
                        tabsBlock: {
                            category: 'Extra'
                        }
                    },
                    'grapesjs-typed': {
                        block: {
                            category: 'Extra',
                            content: {
                                type: 'typed',
                                'type-speed': 100,
                                strings: [
                                    'Text row one',
                                    'Text row two',
                                    'Text row three',
                                ],
                            }
                        }
                    },
                    'grapesjs-preset-webpage': {
                        modalImportTitle: 'Import Template',
                        modalImportLabel: '<div style="margin-bottom: 10px; font-size: 13px;">Paste here your HTML/CSS and click Import</div>',
                        modalImportContent: function(editor) {
                            return editor.getHtml() + '<style>' + editor.getCss() + '</style>'
                        },
                    },
                },
                styleManager: {
                    sectors: [{
                            name: 'General',
                            properties: [{
                                    extend: 'float',
                                    type: 'radio',
                                    default: 'none',
                                    options: [{
                                            value: 'none',
                                            className: 'fa fa-times'
                                        },
                                        {
                                            value: 'left',
                                            className: 'fa fa-align-left'
                                        },
                                        {
                                            value: 'right',
                                            className: 'fa fa-align-right'
                                        }
                                    ],
                                },
                                'display',
                                {
                                    extend: 'position',
                                    type: 'select'
                                },
                                'top',
                                'right',
                                'left',
                                'bottom',
                            ],
                        }, {
                            name: 'Dimension',
                            open: false,
                            properties: [
                                'width',
                                {
                                    id: 'flex-width',
                                    type: 'integer',
                                    name: 'Width',
                                    units: ['px', '%'],
                                    property: 'flex-basis',
                                    toRequire: 1,
                                },
                                'height',
                                'max-width',
                                'min-height',
                                'margin',
                                'padding'
                            ],
                        }, {
                            name: 'Typography',
                            open: false,
                            properties: [
                                'font-family',
                                'font-size',
                                'font-weight',
                                'letter-spacing',
                                'color',
                                'line-height',
                                {
                                    extend: 'text-align',
                                    options: [{
                                            id: 'left',
                                            label: 'Left',
                                            className: 'fa fa-align-left'
                                        },
                                        {
                                            id: 'center',
                                            label: 'Center',
                                            className: 'fa fa-align-center'
                                        },
                                        {
                                            id: 'right',
                                            label: 'Right',
                                            className: 'fa fa-align-right'
                                        },
                                        {
                                            id: 'justify',
                                            label: 'Justify',
                                            className: 'fa fa-align-justify'
                                        }
                                    ],
                                },
                                {
                                    property: 'text-decoration',
                                    type: 'radio',
                                    default: 'none',
                                    options: [{
                                            id: 'none',
                                            label: 'None',
                                            className: 'fa fa-times'
                                        },
                                        {
                                            id: 'underline',
                                            label: 'underline',
                                            className: 'fa fa-underline'
                                        },
                                        {
                                            id: 'line-through',
                                            label: 'Line-through',
                                            className: 'fa fa-strikethrough'
                                        }
                                    ],
                                },
                                'text-shadow'
                            ],
                        }, {
                            name: 'Decorations',
                            open: false,
                            properties: [
                                'opacity',
                                'border-radius',
                                'border',
                                'box-shadow',
                                'background', // { id: 'background-bg', property: 'background', type: 'bg' }
                            ],
                        }, {
                            name: 'Extra',
                            open: false,
                            buildProps: [
                                'transition',
                                'perspective',
                                'transform'
                            ],
                        }, {
                            name: 'Flex',
                            open: false,
                            properties: [{
                                name: 'Flex Container',
                                property: 'display',
                                type: 'select',
                                defaults: 'block',
                                list: [{
                                        value: 'block',
                                        name: 'Disable'
                                    },
                                    {
                                        value: 'flex',
                                        name: 'Enable'
                                    }
                                ],
                            }, {
                                name: 'Flex Parent',
                                property: 'label-parent-flex',
                                type: 'integer',
                            }, {
                                name: 'Direction',
                                property: 'flex-direction',
                                type: 'radio',
                                defaults: 'row',
                                list: [{
                                    value: 'row',
                                    name: 'Row',
                                    className: 'icons-flex icon-dir-row',
                                    title: 'Row',
                                }, {
                                    value: 'row-reverse',
                                    name: 'Row reverse',
                                    className: 'icons-flex icon-dir-row-rev',
                                    title: 'Row reverse',
                                }, {
                                    value: 'column',
                                    name: 'Column',
                                    title: 'Column',
                                    className: 'icons-flex icon-dir-col',
                                }, {
                                    value: 'column-reverse',
                                    name: 'Column reverse',
                                    title: 'Column reverse',
                                    className: 'icons-flex icon-dir-col-rev',
                                }],
                            }, {
                                name: 'Justify',
                                property: 'justify-content',
                                type: 'radio',
                                defaults: 'flex-start',
                                list: [{
                                    value: 'flex-start',
                                    className: 'icons-flex icon-just-start',
                                    title: 'Start',
                                }, {
                                    value: 'flex-end',
                                    title: 'End',
                                    className: 'icons-flex icon-just-end',
                                }, {
                                    value: 'space-between',
                                    title: 'Space between',
                                    className: 'icons-flex icon-just-sp-bet',
                                }, {
                                    value: 'space-around',
                                    title: 'Space around',
                                    className: 'icons-flex icon-just-sp-ar',
                                }, {
                                    value: 'center',
                                    title: 'Center',
                                    className: 'icons-flex icon-just-sp-cent',
                                }],
                            }, {
                                name: 'Align',
                                property: 'align-items',
                                type: 'radio',
                                defaults: 'center',
                                list: [{
                                    value: 'flex-start',
                                    title: 'Start',
                                    className: 'icons-flex icon-al-start',
                                }, {
                                    value: 'flex-end',
                                    title: 'End',
                                    className: 'icons-flex icon-al-end',
                                }, {
                                    value: 'stretch',
                                    title: 'Stretch',
                                    className: 'icons-flex icon-al-str',
                                }, {
                                    value: 'center',
                                    title: 'Center',
                                    className: 'icons-flex icon-al-center',
                                }],
                            }, {
                                name: 'Flex Children',
                                property: 'label-parent-flex',
                                type: 'integer',
                            }, {
                                name: 'Order',
                                property: 'order',
                                type: 'integer',
                                defaults: 0,
                                min: 0
                            }, {
                                name: 'Flex',
                                property: 'flex',
                                type: 'composite',
                                properties: [{
                                    name: 'Grow',
                                    property: 'flex-grow',
                                    type: 'integer',
                                    defaults: 0,
                                    min: 0
                                }, {
                                    name: 'Shrink',
                                    property: 'flex-shrink',
                                    type: 'integer',
                                    defaults: 0,
                                    min: 0
                                }, {
                                    name: 'Basis',
                                    property: 'flex-basis',
                                    type: 'integer',
                                    units: ['px', '%', ''],
                                    unit: '',
                                    defaults: 'auto',
                                }],
                            }, {
                                name: 'Align',
                                property: 'align-self',
                                type: 'radio',
                                defaults: 'auto',
                                list: [{
                                    value: 'auto',
                                    name: 'Auto',
                                }, {
                                    value: 'flex-start',
                                    title: 'Start',
                                    className: 'icons-flex icon-al-start',
                                }, {
                                    value: 'flex-end',
                                    title: 'End',
                                    className: 'icons-flex icon-al-end',
                                }, {
                                    value: 'stretch',
                                    title: 'Stretch',
                                    className: 'icons-flex icon-al-str',
                                }, {
                                    value: 'center',
                                    title: 'Center',
                                    className: 'icons-flex icon-al-center',
                                }],
                            }]
                        },
                        // ...
                        {
                            id: 'extra',
                            name: 'Extra',
                            properties: [{
                                    extend: 'filter'
                                },
                                {
                                    extend: 'filter',
                                    property: 'backdrop-filter'
                                },
                            ],
                        }
                    ]
                },

            });

            const pn = editor.Panels;
            const modal = editor.Modal;
            const cmdm = editor.Commands;

            // Menambahkan tombol ke panel atas
            pn.addButton('options', {
                id: 'back-button',
                className: 'fa fa-arrow-left',
                label: ' Back',
                command: 'navigate-back',
                attributes: {
                    title: 'Go back to pages list'
                },
            });

            // Mendefinisikan perintah untuk tombol yang ditambahkan
            const backButtonUrl = "{{ route("admin.pages.index") }}";
            cmdm.add('navigate-back', {
                run(editor, sender) {
                    sender.set('active', false); // Menonaktifkan tombol setelah diklik (opsional)
                    window.location.href = backButtonUrl;
                }
            });

            // Show borders by default
            pn.getButton('options', 'sw-visibility').set({
                command: 'core:component-outline',
                'active': true,
            });

            // Load and show settings and style manager
            var openTmBtn = pn.getButton('views', 'open-tm');
            openTmBtn && openTmBtn.set('active', 1);
            var openSm = pn.getButton('views', 'open-sm');
            openSm && openSm.set('active', 1);

            // Open block manager
            var openBlocksBtn = editor.Panels.getButton('views', 'open-blocks');
            openBlocksBtn && openBlocksBtn.set('active', 1);
        </script>

        <script>
            $(document).ready(function() {
                setTimeout(() => {
                    $('#lspn').remove();
                }, 1000);
            });
        </script>
    </body>

</html>
