<template>
<div>
    <HeaderBar />
    <Nuxt />
    <FooterBar />
</div>
    
</template>

<script>
export default {
      head() {
      return {
        title: this.title,
        meta: [
          // hid is used as unique identifier. Do not use `vmid` for it as it will not work
          {
            hid: 'description',
            name: 'description',
            content: 'My custom description'
          }
        ]
      }
    }
}

</script>

<style>
    body {
    max-width: 1080px;
    margin: auto;
    height: 100vh;
    padding: 5px;
    }

    /* FONTS */

    p, h1, h2, h3, h4, li {
    font: Barlow;
    font-size: 16px;
    font-weight: regular;
    line-height: 1.4;
    color: #054065;
    }

    hr{
    color: #054065;
    }

    h1, h2, h3, h4{
    color: #086BA8;
    }

    a, .nav-link {
    color: #AD4900 !important;
    }

    a:hover, .nav-link:hover {
    color: #8F2B00 !important;
    }

    h1 {
    font-size: 32px;
    font-weight: bold;
    }

    h2 {
    font-size: 24px;
    font-weight: bold;
    }

    h3 {
    font-size: 18px;
    font-weight: bold;
    }

    h4 {
    font-size: 16px;
    font-weight: bold;
    }

</style>