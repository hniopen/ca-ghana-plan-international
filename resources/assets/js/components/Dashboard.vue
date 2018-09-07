<template>
  <div>
    <div class="panel panel-default">
      <div class="panel-body">

          <div class="row">
            <div class="col-xs-12">
              <form class="form-inline fix-margin">
                <div class="form-group">
                  <label for="">From date</label>
                  <select class="form-control" @change="SELECT_START_DATE($event.target.value)">
                    <option v-for="(date, i) in dateRange" v-bind:value="date" :key="i" v-bind:selected="date == dateFilterStart">{{date}}</option>
                  </select>
                </div>
                <div class="form-group form-group-right">
                  <label for="">To date</label>
                  <select class="form-control" @change="SELECT_END_DATE($event.target.value)">
                    <option v-for="(date, i) in dateRange" v-bind:value="date" :key="i" v-bind:selected="date == dateFilterEnd">{{date}}</option>
                  </select>
                </div>
                <div class="form-group form-group-right">
                  <button class="btn btn-primary" v-on:click.stop.prevent="SELECT_FILTER_DATES()">
                    Filter
                  </button>
                </div>
                <div class="form-group form-group-right" v-on:click.stop.prevent="SELECT_DEFAULT_FILTER_DATES()">
                  <button class="btn btn-default">
                    Reset
                  </button>
                </div>
              </form>
            </div>
          </div>

      </div>
    </div>
    <div>
      <div id="charts">
        <charts></charts>
      </div>
    </div>
  </div>
</template>

<script>
  import Vue from 'vue'
  import { mapState, mapMutations } from 'vuex'

  import Charts from './Charts.vue'

  export default {
    name: 'dashboard',
    components: {
      Charts,
    },
    methods: mapMutations([
      'SELECT_START_DATE',
      'SELECT_END_DATE',
      'SELECT_FILTER_DATES',
      'SELECT_DEFAULT_FILTER_DATES'
    ]),
    computed: mapState([
      'dateRange',
      'dateFilterStart',
      'dateFilterEnd',
    ]) 

  }
</script>
