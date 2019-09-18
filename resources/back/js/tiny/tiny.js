import tinymce from 'tinymce';

import 'tinymce/plugins/code';
import 'tinymce/plugins/image';
import 'tinymce/plugins/advlist';
import 'tinymce/plugins/lists';
import 'tinymce/plugins/anchor';
import 'tinymce/plugins/fullscreen';
import 'tinymce/plugins/link';
import 'tinymce/plugins/visualblocks';
import 'tinymce/plugins/table';
import 'tinymce/plugins/preview';

require('./langs/ru.js');

var defaultToolbar = [
    {
        name: 'code',
        items: [
            'code',
        ]
    },
    {
        name: 'history',
        items: [
            'undo',
            'redo'
        ]
    },
    {
        name: 'styles',
        items: ['styleselect']
    },
    {
        name: 'formatting',
        items: [
            'bold',
            'italic'
        ]
    },
    {
        name: 'alignment',
        items: [
            'alignleft',
            'aligncenter',
            'alignright',
            'alignjustify'
        ]
    },
    {
        name: 'colors',
        items: [
            'forecolor',
            'backcolor',
        ]
    },
    {
        name: 'additional',
        items: [
            'image',
            'anchor',
            'link',
            'numlist',
            'bullist',
            'table',
        ]
    },
    {
        name: 'indentation',
        items: [
            'outdent',
            'indent'
        ]
    },
    {
        name: 'permanent pen',
        items: ['permanentpen']
    },
    {
        name: 'comments',
        items: ['addcomment']
    },
];

var defaultMenubar = 'file edit view insert format tools table help';
var defaultMenus = {
    file: {
        title: 'File',
        items: 'newdocument restoredraft | preview | print | deleteallconversations'
    },
    edit: {
        title: 'Edit',
        items: 'undo redo | cut copy paste pastetext | selectall | searchreplace'
    },
    view: {
        title: 'View',
        items: 'code | visualaid visualchars visualblocks | spellchecker | preview fullscreen | showcomments'
    },
    insert: {
        title: 'Insert',
        items: 'image link media addcomment pageembed template codesample inserttable | charmap emoticons hr | pagebreak nonbreaking anchor toc | insertdatetime'
    },
    format: {
        title: 'Format',
        items: 'bold italic underline strikethrough superscript subscript codeformat | formats blockformats fontformats fontsizes align | forecolor backcolor | removeformat'
    },
    tools: {
        title: 'Tools',
        items: 'spellchecker spellcheckerlanguage | a11ycheck code wordcount'
    },
    table: {
        title: 'Table',
        items: 'inserttable tableprops deletetable row column cell'
    },
    help: {
        title: 'Help',
        items: 'help'
    }
};

tinymce.init({
    selector: '.is-tiny',
    language: 'ru',
    plugins: ['code', 'image', 'link', 'anchor', 'advlist', 'lists', 'fullscreen', 'visualblocks', 'table', 'preview'],
    relative_urls : false,
    document_base_url : "/",
    min_height: 500,
    valid_elements : '*[*]',
    extend_valid_elements: '*[*]',
    file_picker_callback (callback, value, meta) {
        let x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth
        let y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight
        tinymce.activeEditor.windowManager.openUrl({
            url : '/file-manager/tinymce5',
            title : 'Laravel File manager',
            width : x * 0.8,
            height : y * 0.8,
            onMessage: (api, message) => {
                callback(message.content, { text: message.text })
            }
        })
    },
    toolbar: defaultToolbar,
    menubar: defaultMenubar,
    menu: defaultMenus
});
