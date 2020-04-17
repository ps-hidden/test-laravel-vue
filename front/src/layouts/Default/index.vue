<template>
  <div class="layout-default">

    <Header />

    <main class="row">
      <transition name="fade" mode="out-in">
        <slot />
      </transition>
    </main>

  </div>
</template>

<script src="./script.js"></script>
<style lang="sass">@import "style"</style>
