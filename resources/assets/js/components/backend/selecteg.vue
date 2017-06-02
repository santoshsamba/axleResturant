<template>
<div>
	<contentheader :headName="contentTitle"></contentheader>
    <section class="content">
        <roletabs></roletabs>
        asd
	<div>
	  <label class="typo__label">Single select</label>
	  <multiselect v-model="value" :options="options"  placeholder="Pick a value"></multiselect>
	  <pre class="language-json"><code>{{ value  }}</code></pre>
	</div>
    </section> 
    this is test
</div>
</template>
<script>
import headerComp from './contentHeader'
import roleTabs from './roleTabs'
import Multiselect from 'vue-multiselect'

Vue.component('multiselect', Multiselect)
export default {
  components: {
  	headerComp,roleTabs, Multiselect
  },
  data () {
    return {
    	contentTitle: 'select',
      value: '',
      options: ['Select option', 'options', 'selected', 'mulitple', 'label', 'searchable', 'clearOnSelect', 'hideSelected', 'maxHeight', 'allowEmpty', 'showLabels', 'onChange', 'touched']
    }
  }
}
</script>