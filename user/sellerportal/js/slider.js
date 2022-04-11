let span = document.querySelectorAll('.card-btn span');
let product = document.getElementsByClassName('product')
let product_page = Math.ceil(product.length / 4);
let l = 0;
let moveper = 25.34;
let maxmove = 203;

//for mobile


let right_mover = () => {

    l += moveper;

    if (product == 1) { l = 0 }
    for (const i of product) {
        if (l > maxmove) { l -= moveper; }
        i.style.left = '-' + l + '%';
    }

}
let left_mover = () => {

    l -= moveper;

    if (l < 0) { l = 0 }
    for (const i of product) {
        if (product_page > 1)
            i.style.left = '-' + l + '%';
    }

}


span[1].onclick = () => {
    right_mover();
}
span[0].onclick = () => {
    left_mover();
}