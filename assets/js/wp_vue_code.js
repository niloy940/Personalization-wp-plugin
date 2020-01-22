Vue.component('tabs', {
    template: `
        <div style="border: 1px solid green; padding:3px;">
            <div class="tabs is-centered is-boxed is-medium">
              <ul>
                <li v-for="tab in tabs" :class="{ 'is-active' : tab.isActive }">
                  <a :href="tab.href" @click="selectTab(tab)">
                    <span class="icon is-small"><i :class="tab.showIcon" aria-hidden="true"></i></span>
                    <span>{{tab.name}}</span>
                  </a>
                </li>
              </ul>
            </div>

            <div class="tab-details">
                <slot></slot>
            </div>
        </div>
    `,

    data() {
        return{
            tabs: []
        };
    },

    created() {
        this.tabs = this.$children;
    },

    methods: {
        selectTab(selectedTab) {
            this.tabs.forEach(tab => {
                tab.isActive = (tab.name  == selectedTab.name);
            });
        }
    }
});

Vue.component('tab', {
    template:`
        <div v-show="isActive">
            <slot></slot>
        </div>
    `,

    props: {
        name: {required: true},
        selected: {default: false},
    },

    data() {
        return {
            isActive: false,
            showIcon: true,
            row_three: 'some text'
        };
    },

    computed: {
        href() {
            return '#' + this.name.toLowerCase().replace(/ /g, '-');
        }
    },

    mounted() {
        this.isActive = this.selected;

        if (this.href.includes('picture')) {
            return this.showIcon = 'fas fa-image';
        } else if (this.href.includes('music')) {
            return this.showIcon = 'fas fa-music';
        } else if (this.href.includes('video')) {
            return this.showIcon = 'fas fa-film'
        } else if (this.href.includes('document')) {
            return this.showIcon = 'far fa-file-alt'
        } else {
            return this.showIcon = 'fas fa-infinity'
        }
    }
});


Vue.component('modal', {
    template: `
        <div class="modal is-active">
            <div class="modal-background"></div>
            <div class="modal-card">
            <header class="modal-card-head">
              <button @click="$emit('close')" class="delete" aria-label="close"></button>
            </header>

            <section class="modal-card-body">
                <div class="box">
                    <slot></slot>
                </div>
            </section>
          <div>
        </div>
    `,
});



new Vue({
  el: '#wp_per_app',

  data: {
        showModal: false,
        row_one: '',
        row_two: '',
        row_three: '',
    },
});