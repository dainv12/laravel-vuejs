import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios';
import {RESOURCE_PRODUCT} from '../api/api';

Vue.use(Vuex);

const productStore = {
    namespaced: true,
    state: {
        products: [],
        product: {},
        token:'',
    },
    mutations: {
        FETCH(state, products) {
            state.products = products;
        },
        FETCH_ONE(state, product) {
            state.product = product;
        },
        SET_TOKEN: (state, token) => (state.token = token),
    },
    actions: {
        login ({commit},user) {
            return axios.post('/api/login',user)
                .then(function(response){
                    commit('SET_TOKEN', response.data.token)
                    localStorage.setItem('token',JSON.stringify(response.data.token))
                })
                
                .catch();
        },
        logout ({commit}) {
            return axios.delete('/api/logout')
                .then(function(){
                    commit('SET_TOKEN','')
                    localStorage.removeItem('token');
                })
        },
        fetch({ commit }) {
            return axios.get(RESOURCE_PRODUCT)
                .then(response => commit('FETCH', response.data))
                .catch();
        },
        fetchOne({ commit }, id) {
            axios.get(`${RESOURCE_PRODUCT}/${id}`)
                .then(response => commit('FETCH_ONE', response.data))
                .catch();
        },
        deleteProduct({}, id) {
            axios.delete(`${RESOURCE_PRODUCT}/${id}`)
                .then(() => this.dispatch('product/fetch'))
                .catch();
        },
        editProduct({}, product) {
            axios.put(`${RESOURCE_PRODUCT}/${product.id}`, {
                name: product.name,
                price: product.price,
            })
            .then();
        },
        addProduct({}, product) {
            axios.post(`${RESOURCE_PRODUCT}`, {
                name: product.name,
                price: product.price,
            })
                .then();
        }
    }
};

export default productStore;
