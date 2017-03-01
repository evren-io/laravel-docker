<template>
    <div id="gridChannel" class="gridChannelWrap">
        <ul>
            <li v-for="item in channels">
                <a href="#">
                    <div class="channel-align">
                        <div class="img-logo">
                            <img :src="'https://astrocontent.s3.amazonaws.com/Images/ChannelLogo/Pos/'+item.channelStbNumber+'_100.png'">
                        </div>
                        <h2 class="img-title">{{item.channelTitle}}</h2>
                    </div>
                </a>
                <div class="img-channel-sec">
                    <a href="#">
                        <div class="img-chnnel-left">CH {{item.channelStbNumber}}</div>
                    </a>
                    <div class="img-chnnel-right" v-on:click="favourite(item)">
                        <div v-bind:class="{ 'icon-heart-icon': true, active: item.favourite }"></div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</template>
<script>
    export default {
        mounted() {
            var favourite = this.$cookie.get('favourite');
            if (favourite == 'true')
                this.getFavourites(true)
            else
                this.getChannels()
            this.eventsHandling()
        },
        data: function () {
            return {
                channels: []
            }
        },
        methods: {
            eventsHandling: function () {
                var _that = this;
                bus.$on('onFavourite', function (selected) {
                    _that.getFavourites(selected);
                });
            },
            getFavourites: function (selected) {
                if (selected)
                    this.$collection.query(function map(doc) {
                            if (doc.favourite)
                                emit([doc.channelStbNumber, doc.channelTitle, doc.favourite]);
                        },
                        {
                            include_docs: true,
                            attachments: true
                        }, this.update);
                else this.getChannels()
            },
            update: function (err, results) {
                if (results.rows.length > 0) {
                    this.channels = [];
                    for (var i = 0; i < results.rows.length; i++) {
                        this.channels.push(results.rows[i].doc);
                    }
                }
                else this.fetchChannels()
            },
            save: function () {
                for (var i = 0; i < this.channels.length; i++) {
                    var channel = this.channels[i];
                    channel.favourite = false;
                    channel._id = 'channel_' + channel.channelStbNumber;
                    this.$collection.put(channel, function (err, res) {
                        console.log(err, res)
                    });
                }
            },
            fetchChannels: function () {
                this.$http.get('/api/channels').then(response => {
                    this.channels = response.body.channels;
                    this.save();
                }, response => {
                    // error callback
                })
            },
            getChannels: function () {
                this.$collection.allDocs({
                    include_docs: true,
                    attachments: true
                }, this.update);
            },
            favourite: function (item) {
                if (typeof item._id == 'undefined')
                    item._id = 'channel_' + item.channelStbNumber;
                if (typeof item.favourite == 'undefined')
                    item.favourite = true;
                else item.favourite = !item.favourite;

                this.$collection.put(item);
            }
        }
    }
</script>