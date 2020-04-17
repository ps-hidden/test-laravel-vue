<template>
  <a-modal
    title="Modal"
    :visible="$parent.modal !== null"
    @ok="save"
    @cancel="() => $parent.modal = null"
  >

    <a-form-model :model="item" :label-col="{ span: 6 }" :wrapper-col="{ span: 18 }">
      <a-form-model-item :label="$t('first_name')">
        <a-input v-model="item.f_name" />
      </a-form-model-item>

      <a-form-model-item :label="$t('last_name')">
        <a-input v-model="item.l_name" />
      </a-form-model-item>

      <a-form-model-item :label="$t('phone')">
        <a-input v-model="item.phone" />
      </a-form-model-item>

      <a-form-model-item :label="$t('email')">
        <a-input v-model="item.email" />
      </a-form-model-item>

      <a-form-model-item :label="$t('company')">
        <div v-if="item.company">{{ item.company.name }}</div>
        <a-select
          showSearch
          :value="value"
          :defaultActiveFirstOption="false"
          :showArrow="false"
          :filterOption="false"
          @keyup.enter.native="handleSearch"
          @change="handleChange"
          :notFoundContent="null"
        >
          <a-select-option v-for="(val, key) in array" :key="key">{{ val }}</a-select-option>
        </a-select>
      </a-form-model-item>
    </a-form-model>

  </a-modal>
</template>

<script src="./script.js"></script>
<style lang="scss">@import "style";</style>
