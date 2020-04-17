<template>
  <div id="page-login">

    <a-form-model :model="form" :label-col="{ span: 6 }" :wrapper-col="{ span: 18 }">
      <a-form-model-item :label="$t('name')">
        <a-input v-model="form.email" />
      </a-form-model-item>

      <a-form-model-item :label="$t('password')">
        <a-input v-model="form.password" type="password" />
      </a-form-model-item>
    </a-form-model>

    <div class="text-r">
      <a-button @click="signIn">{{$t('sign_in')}}</a-button>
    </div>

  </div>
</template>

<script src="./script.js"></script>
<style lang="sass">@import "style"</style>
