<template>
    <div 
        class="fb-page" 
        :data-href="pageUrl" 
        :data-tabs="tabs" 
        :data-width="width" 
        :data-height="height"
        :data-small-header="smallHeader" 
        :data-adapt-container-width="adaptContainer" 
        :data-hide-cover="hideCover" 
        :data-show-facepile="showFacepile">
    </div>
</template>

<script>
export default {
    props: {
        appId: {
            default: '301113123239090',
            type: String
        },
        pageUrl: {
            default: '',
            type: String
        },
        tabs: {
            default: 'timeline',
            type: String
        },
        width: {
            default: '375',
            type: String
        },
        height: {
            default: '500',
            type: String
        },
        adaptContainer: {
            default: 'true',
            type: String
        },
        smallHeader: {
            default: 'false',
            type: String
        },
        hideCover: {
            default: 'false',
            type: String
        },
        showFacepile: {
            default: 'true',
            type: String
        },
    },

    mounted() {
        let fbScript = document.createElement('script');
        fbScript.async = true;
        fbScript.defer = true;
        fbScript.crossOrigin = "anonymous";
        fbScript.setAttribute('src', 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2&&appId=' + this.appId + '&autoLogAppEvents=1');
        document.head.appendChild(fbScript)
    },
}
</script>
