<template>
  <div class="flex flex-col bg-solarized">
    <div class="w-full flex items-center justify-between h-12 bg-solarized">
        <div class="pl-4 bg-solarized">
          <div class="inline-block relative w-64">
            <select v-model="language" class="block appearance-none w-full bg-gray-200 text-gray-700 border border-gray-400 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
              <option
                v-for="(lang, index) in languages"
                :key="index"
                :value="lang.name"
                v-text="lang.label"
                :selected="lang.name == language"
              ></option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
              <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
            </div>
          </div>
        </div>
        <div class="pr-4 bg-solarized">
        <a href="/" class="py-1 px-4 rounded-full bg-solarized-blue-base text-gray-900 items-center justify-end font-bold">New</a>
        <a v-if="paste" :href="`/fork/${paste.hash}`" class="py-1 px-4 ml-2 rounded-full bg-solarized-gray-base text-gray-200 items-center justify-end font-bold">Fork</a>
        <button class="py-1 px-4 ml-2 rounded-full bg-gray-200 text-gray-700 items-center justify-end font-bold" @click="savePaste">Save</button>
      </div>
    </div>
    <MonacoEditor ref="editor" class="mt-2 w-full flex-grow" v-model="code" :language="language" :options="options"></MonacoEditor>
    <div class="px-2 w-full flex items-center justify-between h-6 bg-solarized-highlight font-mono font-semibold text-sm" v-if="createdAt">
        <span v-if="options.readOnly === true" class="text-red-600 font-semibold">Read Only</span>
        <span class="text-gray-500">Created At: {{createdAt}}</span>
    </div>
  </div>
</template>
<script>
import Solarized from 'monaco-themes/themes/Solarized-dark.json'
import MonacoEditor from "vue-monaco";
export default {
  components: {
    MonacoEditor
  },
  props: ['readOnly', 'paste'],
  data() {
    return {
      createdAt: null,
      languages: [
        { label: 'PHP', name: 'php'},
        { label: 'Html', name: 'html'},
        { label: 'JavaScript', name: 'javascript'},
      ],
      language: 'php',
      code: "",
      options: {
        theme: 'vs-dark',
        fontSize: 16,
        fontFamily: "Source Code Pro",
        autoIndent: true,
        autoSurround: "always",
        autoClosingBrackets: "always",
        quickSuggestions: true,
        autoClosingQuotes: "always",
        readOnly: this.readOnly,
        tabCompletion: 'on',
        fontLigatures: true,
        formatOnPaste: true,
        showFoldingControls: 'mouseover',
        useTabStops: true,
        minimap: {
          enabled: false
        }
      }
    };
  },
  methods: {
    selectLanguage(language) {
      this.language = language.name
    },
    savePaste() {
      if (this.readOnly) {
        alert('Read Only')
        return;
      }

      if ( !this.paste ) {
        axios.post('/', {code: this.code}).then(({data}) => {
            window.location.href = `/${data.hash}`
        }).catch(err => {
          alert('Oups, didnt work!')
        })
      } else if (this.paste.hash && !this.readOnly) {
        axios.patch(`/${this.paste.hash}`, {code: this.code}).then(({data}) => {
            window.location.href = `/${data.hash}`
        }).catch(err => {
          alert('Oups, didnt work!')
        })
      }
    },
  },
  mounted() {
    // let monaco = this.$refs.editor.getMonaco()
    this.$refs.editor.monaco.editor.defineTheme('Solarized-Dark', Solarized);
    this.$refs.editor.monaco.editor.setTheme('Solarized-Dark')

    // window.addEventListener("keyup"prevent., function(e) {
    //   console.log(e.keyCode)
    // });
  },
  created() {
    if (this.paste) {
      this.code = this.paste.code
      this.options.readOnly = true
      this.createdAt = this.paste.created_at
    }
  }
};
</script>
<style scoped>
  .bg-solarized {
    background: #002b36;
  }
  .bg-solarized-highlight {
    background: #073642;
  }
</style>
