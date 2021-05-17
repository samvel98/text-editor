<template>
    <div class="container">
        <div class="row justify-content-center">
            <input type="button" id="dwn-btn" value="Download .txt "/>
        </div>
    </div>
</template>

<script>
    function download(filename, text) {
        var element = document.createElement('a');
        element.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(text));
        element.setAttribute('download', filename);

        element.style.display = 'none';
        document.body.appendChild(element);

        element.click();

        document.body.removeChild(element);
    }

    // Start file download.
    export default {
        mounted() {
            document.getElementById("dwn-btn").addEventListener("click", function(){
                var text = tinymce.get('#textarea').getContent();;
                var filename = "my-text.txt";
                
                download(filename, text);
            }, false);
        }
    }
</script>
