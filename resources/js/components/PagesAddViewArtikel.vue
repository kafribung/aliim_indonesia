<template>
</template>

<script>
export default {
    props: ['getview', 'route'],
    created() {
        this.updateViewArtikel()
    },
    methods: {
        updateViewArtikel(){
            setTimeout(() => {
                const data = {
                    "view" : (parseInt(this.getview) + 1)
                }
                axios.patch(this.route, data)
                .then(() => console.log('masuk'))
                .catch(error => console.log(error.data))
            }, 5000);
        }
    },
}
</script>