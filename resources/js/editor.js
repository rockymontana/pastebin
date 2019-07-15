import * as monaco from 'monaco-editor';

self.MonacoEnvironment = {
    getWorkerUrl: function (moduleId, label) {
        if (label === 'json') {
            return './js/json.worker.bundle.js';
        }
        if (label === 'css') {
            return './js/css.worker.bundle.js';
        }
        if (label === 'html') {
            return './js/html.worker.bundle.js';
        }
        if (label === 'typescript' || label === 'javascript') {
            return './js/ts.worker.bundle.js';
        }
        return './js/editor.worker.bundle.js';
    }
}


let solarizedDark = require('monaco-themes/themes/Solarized-dark.json')
monaco.editor.defineTheme('Solarized-Dark', solarizedDark);
monaco.editor.create(document.getElementById('editor'), {
    language: 'php',
    fontSize: 16,
    fontFamily: 'Source Code Pro',
    autoIndent: true,
    autoSurround: 'always',
    autoClosingBrackets: 'always',
    autoClosingQuotes: 'always',
    minimap: {
        enabled: false
    }
})
monaco.editor.setTheme('Solarized-Dark')
// monaco.editor.setModelLanguage('php')