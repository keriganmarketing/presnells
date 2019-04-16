<template>
    <div>
        <div id="TA_selfserveprop951" class="TA_selfserveprop">
            <ul id="7bSodSb" class="TA_links 4k6oJe9hM">
                <li id="Y6FyVwYQz7" class="NsR8JB">
                    <a target="_blank" href="https://www.tripadvisor.com/">
                        <img src="https://www.tripadvisor.com/img/cdsi/img2/branding/150_logo-11900-2.png" alt="TripAdvisor"/>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        locationId: {
            default: '',
            type: String
        },
        hasRating: {
            default: 'true',
            type: String
        },
        numReviews: {
            default: '5',
            type: String
        },
        border: {
            default: 'false',
            type: String
        },
        isWide: {
            default: 'true',
            type: String
        },
        writeReviews: {
            default: 'true',
            type: String
        }
    },

    data() {
        return {
            script: {}
        }
    },

    created() {
        this.script.src = 'https://www.jscache.com/wejs?wtype=selfserveprop&amp;uniq=961&amp;lang=en_US&amp;popIdx=true&amp;display_version=2' +
            'locationId=' + this.locationId + '&amp;' +
            'rating=' + this.hasRating + '&amp;' +
            'nreviews=' + this.numReviews + '&amp;' + 
            'writereviewlink=' + this.writeReviews + '&amp;' +
            'iswide=' + this.isWide + '&amp;' + 
            'border=' + this.border;

        let taScript = document.createElement('script');
        taScript.async = true;
        taScript.setAttribute('src', this.script.src);
        taScript.onload = function(){
            console.log('script loaded');
            this.loadtrk = true;
        };
        // document.body.appendChild(taScript)
    },
}
</script>

<style lang="less" >
#TA_selfserveprop951 {
    height: 100% !important;
    width: 100% !important;
    &>img {
        position: absolute;
    }

    #CDSWIDSSP {
        width: 100% !important;
        height: 100% !important;
    }
}
</style>
