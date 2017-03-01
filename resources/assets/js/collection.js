import pouch from 'pouchdb';

var Collection = {
    db: null,
    install: function (Vue, options) {
        this.db = new pouch('collection', {adapter : 'websql'});;

        Vue.prototype.$collection = this.db;
    }
}
export default Collection;