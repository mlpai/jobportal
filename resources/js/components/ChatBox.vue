<template>
    <div class="">
        <div class="box box-warning direct-chat direct-chat-warning">

                <div class="box-body">
                    <!-- Conversations are loaded here -->
                    <div class="direct-chat-messages">
                    <!-- Message. Default to the left -->
                    <div class="direct-chat-msg">
                        <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name float-left">Name</span>
                        <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                        </div>
                        <!-- /.direct-chat-info -->
                        <img class="direct-chat-img" src="images/profiles/" alt="message user image">
                        <!-- /.direct-chat-img -->
                        <div class="direct-chat-text">
                        Is this template really for free? That's unbelievable!
                        </div>
                        <!-- /.direct-chat-text -->
                    </div>
                    <!-- /.direct-chat-msg -->
                    <!-- Message to the right -->
                    <div class="direct-chat-msg right">
                        <div class="direct-chat-info clearfix ">
                        <span class="direct-chat-name float-right">Name Rec</span>
                        <span class="direct-chat-timestamp float-left ">23 Jan 2:05 pm</span>
                        </div>
                        <!-- /.direct-chat-info -->
                        <img class="direct-chat-img" src="images/profiles/" alt="message user image">
                        <!-- /.direct-chat-img -->
                        <div class="direct-chat-text">
                        You better believe it!
                        </div>
                        <!-- /.direct-chat-text -->
                    </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <form method="post">
                    <div class="input-group">
                        <input type="text" name="message" placeholder="Type Message ..." class="form-control @error('message') is-invalid @enderror">
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-warning btn-flat">Send</button>
                            </span>
                    </div>
                    </form>
                </div>
                <!-- /.box-footer-->
                </div>
        </div>
</template>

<script>
export default {

}
</script>
