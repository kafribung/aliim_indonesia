<template>
    <div>
        <!-- Provinsi -->
        <div class="form-group">
            <label for="provinci" class="control-label mb-1">Provinsi</label>
            <select name="provinci" v-model="provinci" @change="getDistrict" id="provinci" class="form-control" required>
                <option v-for="(provinci, index) in provincis" :key="index" :value="provinci.id">{{ provinci.nama }}</option>
            </select>
        </div>
        <!-- Kabupaten -->
        <div class="form-group">
            <label for="distric" class="control-label mb-1">Kabupaten</label>
            <select name="district" id="district" class="form-control" required>
                <option v-if="districts.length == null" selected disabled value="">Pilih Provinsi Terlebih Dahulu</option>
                <option v-for="(district, index) in districts" :key="index">{{ district.nama }}</option>
            </select>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            provincis: {},
            provinci: 11,
            districts: {},
        }
    },
    mounted() {
        this.getProvinci()
    },

    methods: {
        async getProvinci(){
            const response = await axios.get(`https://dev.farizdotid.com/api/daerahindonesia/provinsi`);
            this.provincis = response.data.provinsi 
        },

        async getDistrict(){
            const response = await axios.get(`https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=${this.provinci}`)
            this.districts  =  response.data.kota_kabupaten
        }
    },
}
</script>

<style>

</style>