<template>
    <div>
        <select class="form-control" @change="updateStatus" v-model="selected">
            <option v-for="option in options" v-bind:value="option.value" >{{option.text}}</option>
        </select>
    </div>
</template>

<script>
export default {
    props : ['job_id','jobseeker','default_value'],
    data : () => {
        return {
            selected : 1,
        options : [
            {text : 'Awaiting-Review', 'value' : 1},
            {text : 'Reviewed',value : 2 },
            {text : 'Contacting',value : 3 },
            {text : 'Interviewed',value : 4 },
            {text : 'OfferMade',value : 5 },
            {text : 'Rejected',value : 6 },
            {text : 'Hired',value : 7 }
        ]
        }
    },

    methods: {
        updateStatus(){
            axios.post('/company/update/Status/'+this.job_id+'/'+this.jobseeker+'/'+this.selected)
            .then(res => {
                Toast.fire({
                        type: 'success',
                        title: res.data.Success+' to '+this.options[parseInt(this.selected)-1].text+' successfully !',
                    })
            })
            .catch(err => {
                console.error(err);
            })
        },


    },

    mounted() {
        this.selected = this.default_value;
    },
}
</script>
