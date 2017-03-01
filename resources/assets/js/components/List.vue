<template>
    <div id="listChannel" class="listChannelWrap listChannel">
        <ul>
            <li class="listview" v-for="item in channels">
                <div class="list-logo-section point-cursor">
                    <a href="#">
                        <img v-bind:src="'https://astrocontent.s3.amazonaws.com/Images/ChannelLogo/Pos/'+item.channelStbNumber+'_100.png'"><br>
                        CH 101
                    </a>
                </div>
                <div class="list-title-section point-cursor">
                    <div class="channels-fav-list">
                        <a href="#">
                            <h2> TV1</h2>
                        </a>
                        <span class="icon icon-heart-icon"></span>
                    </div>
                    <a href="#">
                        <p>Gazet Fesyen</p>
                    </a>
                    <div class="chennelTimeRight">
                        <ul>
                            <li class="date-channel-list">Tue 28, Feb 2017 1:30 AM</li>
                            <!-- <li>LIVE</li>
                            <li>NEW</li> -->
                        </ul>
                    </div>
                    <ul class="mobile-display-none ">
                        <li>ON NOW</li>
                        <li>Ends in 11 mins at 02:00 am</li>
                    </ul>
                </div>
                <div class="channelEpisodeSection ">
                    <a href="#">
                        <p>Beret Hijau</p>
                    </a>
                    <p class="nextshow-date">Tue 28, Feb 2017 2:00 AM</p>
                </div>
            </li>
        </ul>
    </div>
</template>
<script>
    export default {

        mounted() {
            this.fetchChannels()
        },
        data: function () {
            return {
                channels: []
            }
        },
        methods: {
            fetchChannels: function () {
                this.$set(this, 'channels', [{channelTitle: "HBO", channelStbNumber: 101}])
            }
        }

    }
</script>