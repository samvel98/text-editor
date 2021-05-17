<template>
  <div v-html="textField" class="user-doc" v-on:click="updateTextArea()">{{textField}}</div>
</template>

<script>
  export default {
    props: ['textField', 'docId'],

    methods: {
      updateTextArea() {
        tinymce.get('#textarea').setContent(this.textField);
        document.getElementById('selectedDocId').value = this.docId;
      }
    }
  }
</script>