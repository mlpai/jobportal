<template>
    <div>
        <div class="btn-group" role="group">
            <a id="btnGroupDrop1" style="cursor:pointer;" class="link  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i v-bind:class="{'green-ico' : isGreen,  'red-ico' : isRed}" class="fas fa-circle"></i> {{btnLable}}
            </a>
            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                    <a class="dropdown-item" href="#" @click="open"  ><i class="fas green-ico fa-circle"></i> Open</a>
                    <a class="dropdown-item" @click="close" href="#"><i class="fas red-ico fa-circle"></i> close</a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['post_id','text','url1','cmp_id'],

        mounted() {
            // console.log('Component mounted.'),
            if(this.url1 != undefined)
            {
                this.url = this.url1;
            }
            if(this.cmp_id != undefined)
            {
                this.cmp = this.cmp_id;
            }
            this.text == 1 ? this.open(0)  : this.close(0);
        },

        data : () => {
            return {
                'btnLable' : 'Open',
                'isGreen' : false,
                'isRed' : false,
                'url' :  '/j/company/update/postStatus',
                'cmp' : '',
            }
        },

        methods: {


            close(p=1) {
                this.btnLable = 'Close';
                this.isRed = true;
                this.isGreen = false;
                if(p)
                {
                    this.updateState(this.post_id);
                }
            },

            open(p=1) {
                this.btnLable = 'Open';
                this.isRed = false;
                this.isGreen = true;
                if(p)
                {
                    this.updateState(this.post_id);
                }
            },

            updateState(id){
                axios.patch(this.url,{'id':id,'text':this.btnLable,'cmp':this.cmp})
                .then(res => {
                    Toast.fire({
                        type: 'success',
                        title: res.data.Success,
                    })
                })
                .catch(err => {
                    console.error(err);
                })
            },

        },


    }
</script>
