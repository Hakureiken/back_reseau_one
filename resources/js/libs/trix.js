import Trix from 'trix';

window.Trix = Trix;

const itemsTrix = ['.trix-button--icon-code','.trix-button--icon-attach'];

for (let i = 0; i < itemsTrix.length; i++) {
    if (document.querySelector(itemsTrix[i])) {
        
        document.querySelector(itemsTrix[i]).remove();
    }
}

export default Trix;

