import {toast} from '../utils/alert'

export default class Toast extends HTMLElement {
    async connectCallback() {
        await toast(
            this.getAttribute('type'),
            this.getAttribute('message')
        )
    }
}