<template>
  <a-modal
    title="Company Modal"
    :visible="$parent.modal !== null"
    @ok="save"
    @cancel="() => $parent.modal = null"
  >

    <a-form-model :model="item" :label-col="{ span: 6 }" :wrapper-col="{ span: 18 }">
      <a-form-model-item :label="$t('name')">
        <a-input v-model="item.name" />
      </a-form-model-item>

      <a-form-model-item :label="$t('email')">
        <a-input v-model="item.email" />
      </a-form-model-item>

      <a-form-model-item :label="$t('website')">
        <a-input v-model="item.website" />
      </a-form-model-item>

      <a-form-model-item label="Logo">
        <input type="file" id="company_logo" accept="image/*" />
      </a-form-model-item>
    </a-form-model>

  </a-modal>
</template>

<script src="./script.js"></script>
<style lang="scss">@import "style";</style>
