<template>
  <div id="app" :class="{ loading: $isLoading() }">

    <component :is="layout">
      <router-view />
    </component>

  </div>
</template>

<style lang="sass">@import "./style/app"</style>
<script>
import Default from '@/layouts/Default'

const components = { Default }

export default {
  components,
  computed: {
    layout () {
      const key = this.$get(this.$route, 'meta.layout')
      return components[key] ? key : 'Default'
    }
  }
}
</script>
