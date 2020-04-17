<template>
  <div>

    <h2>{{$t('companies')}}</h2>

    <p v-if="$isRole('ADMIN')">
      <a-button type="danger" @click="toModal">{{$t('add_new')}}</a-button>
    </p>

    <a-table :scroll="{ x: 800 }"
             :columns="table.columns"
             :rowKey="record => record.id"
             :dataSource="table.array"
             :pagination="table.pagination"
             :loading="table.loading"
             @change="tableChange">

      <div slot="logo" slot-scope="row">
        <img v-if="row.logo_url" :src="row.logo_url" alt="" width="60px">
        <span v-else>-</span>
      </div>

      <div slot="delete" slot-scope="row">
        <a-button type="danger"
                  size="small"
                  @click="remove(row.id)">{{$t('delete')}}</a-button>
      </div>

      <div slot="action" slot-scope="row">
        <a-button type="primary"
                  size="small"
                  @click="toModal(row)">{{$t('edit')}}</a-button>
      </div>

    </a-table>

    <Edit v-if="modal" />

  </div>
</template>

<script src="./script.js"></script>
<style lang="sass">@import "style"</style>
