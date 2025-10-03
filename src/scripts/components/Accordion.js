export default class Accordion {
    constructor(element) {
        this.element = element;
        this.options = {
          notClosing: false,
        };
        this.numberOpen = 0;
    
        this.init();
    }

    init() {
        console.log('Initialisation de ma composante Accordéon');
    
        this.setOptions();

        let headers = this.element.querySelectorAll(".js-header");
        for (let i = 0; i < headers.length; i++) {
            const header = headers[i];
            if('autoOpen' in header.dataset){
                header.classList.add("is-active_ac");
                this.numberOpen++;
            }
            header.addEventListener("click", this.openAccordion.bind(this));
        }
    }

    setOptions(){
        if ('notClosing' in this.element.dataset) {
            this.options.notClosing = true;
        }
    }

    openAccordion(evt){
        evt = evt.currentTarget;
        
        if(evt.classList.contains("is-active_ac")){
            evt.classList.remove("is-active_ac");
            return;
        }
        
        if(!this.options.notClosing){
            let headers = this.element.querySelectorAll(".js-header");
            for (let i = 0; i < headers.length; i++) {
                const header = headers[i];
                if(this.numberOpen <= 1){
                    header.classList.remove("is-active_ac");
                }
            }
        }
        
        evt.classList.add("is-active_ac");
        
    }
}