<template>
    <div class="row">
        <div class="col-md-4">
            <div class="card" >
                <div class="card-header">
                  <b>Messages</b>
                </div>
                <div class="container">
                    <ul class="list-group list-group-flush">

                            <li class="list-group-item" v-for="post in posts" >
                                <a href="#" @click=loadThis(post.JobTitle,post.company_id) class="link" > {{post.JobTitle}} </a>
                                <span class="badge badge-danger float-right ">1</span>
                            </li>

                    </ul>
                </div>
              </div>
        </div>
        <div class="col-md-8">
                <div v-if="show == true" class="card">
                    <div class="card-header">
                    <b>{{title}}</b>
                    </div>
                       <div class="box box-warning direct-chat direct-chat-warning">

                <div class="box-body">
                    <!-- Conversations are loaded here -->
                    <div class="direct-chat-messages" >
                        <!-- Message. Default to the left -->
                        <div v-for="data in msgs" class="direct-chat-msg" :class="[data.sentBy ? 'right' : 'left']" >
                            <div class="direct-chat-info clearfix">
                            <span v-if="data.sentBy == 1" class="direct-chat-name " :class="[data.sentBy ? 'float-right' : 'float-left']">You</span>
                            <span v-else class="direct-chat-name " :class="[data.sentBy ? 'float-right' : 'float-left']">{{cmp}}</span>
                            <span class="direct-chat-timestamp small " :class="[data.sentBy ? 'float-left' : 'float-right']" >{{data.created_at | formatDate}}</span>
                            </div>
                            <!-- /.direct-chat-info -->

                            <img  v-if="data.sentBy == 1" class="direct-chat-img" :src=" url+'/images/' + [photo ? 'profiles/'+users.photo : 'user.jpg'] " alt="message user image">

                            <img v-else class="direct-chat-img" :src=" url+'/images/' + [cphoto ? 'profiles/'+pic : 'user.jpg'] " alt="message user image">

                            <!-- /.direct-chat-img -->
                            <div class="direct-chat-text">
                                {{data.message}}
                            </div>
                            <!-- /.direct-chat-text -->
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">

                    <div class="input-group">
                        <input type="text" name="message" v-model="text" placeholder="Type Message ..." class="form-control"  :class="[error ? 'is-invalid' : '']" >
                        <span class="input-group-btn">
                            <button type="button" @click="setmsg()" class="btn btn-warning btn-flat">Send</button>
                            </span>
                    </div>

                </div>
                <!-- /.box-footer-->
                </div>
              </div>
        </div>
    </div>
</template>

<script>
export default {
    props : ['posts','jobseeker'],

    data : () => {
        return {
            pos : false,
            error : false,
            photo : false,
            cphoto : false,
            users : null,
            pic : null,
            cmp : 'You',
            msgs : null,
            text : '',
            title : '',
            j_id : null,
            c_id : null,
            show : false,
            url : location.protocol + '//' + location.host,
        }
    },

    methods: {

        loadThis(title,id){
            this.title = title;
            this.c_id = id;
            this.show = true;
            this.getmsg();
            let autometic = setInterval(this.getmsg,3000);
        },

        setmsg(){
            if(this.text == ''){this.error = true} else {
                axios.post('/msg',{message:this.text, jobseeker_id : this.j_id, company_id : this.c_id})
                .then(res => {
                    this.error = false;
                    this.getmsg();
                    this.text = '';
                })
                .catch(err => {
                    console.error(err);
                })
            }
        },
        getmsg(){
            axios.get('/jobseekers/msg/'+this.j_id+'/'+this.c_id)
            .then(res => {
                if(res.data.user.photo != null)
                {
                     this.photo = true;
                }
                if(res.data.cmp.name != null)
                {
                     this.cmp = res.data.cmp.name;
                }
                if(res.data.cmp.photo != null)
                {
                     this.cphoto = true;
                     this.pic = res.data.cmp.photo;
                }
                this.msgs = res.data.chats;
                this.users = res.data.user;
            })
            .catch(err => {
                console.error(err);
            })
        }
    },

    mounted() {
        this.j_id = this.jobseeker;
    },

    beforeDestroy() {
        clearInterval(autometic);
    },
}
</script>
