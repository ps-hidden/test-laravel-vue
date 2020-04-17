<template>
  <div class="header">
    <div class="row flex">

      <h1>Test</h1>

      <router-link :to="{ name: 'home' }"
                   class="header__a">
        {{$t('companies')}}
      </router-link>

      <router-link :to="{ name: 'employees' }"
                   class="header__a">
        {{$t('employees')}}
      </router-link>

      <router-link :to="{ name: 'login' }"
                   v-if="!$user()"
                   class="header__a">
        {{$t('login')}}
      </router-link>

    </div>
  </div>
</template>

<script src="./script.js"></script>
<style lang="sass">@import "style"</style>
