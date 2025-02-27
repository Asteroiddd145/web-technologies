class Pizza {
    constructor(size) {
        this.size = size
        this.toppings = []
    }

    getToppings() {
        return this.toppings
    }

    getSize() {
        return this.size
    }

    addTopping(topping) {
        this.toppings.push(topping)
        this.updateUI();
    }
    
    removeTopping(topping) {
        this.toppings = this.toppings.filter(t => t != topping)
        this.updateUI();
    }

    calculatePrice() {
        return this.price + this.size.price + this.toppings.reduce((sum, t) => sum + t.price, 0)
    }
    calculateCalories() {
        return this.calories + this.size.calories + this.toppings.reduce((sum, t) => sum + t.calories, 0)
    }

    updateUI() {
        const price = this.calculatePrice()
        const calories = this.calculateCalories()
        document.getElementById("buyButton").innerHTML = `Добавить в корзину за<br>${price} ₽ (${calories} кКалл)`
    }
}

class Margaret extends Pizza {
    constructor(size) {
        super(size)
        this.price = 500
        this.calories = 300
    }
}

class Pepperoni extends Pizza {
    constructor(size) {
        super(size)
        this.price = 800
        this.calories = 400
    }
}

class Bavarian extends Pizza {
    constructor(size) {
        super(size)
        this.price = 700
        this.calories = 450
    }
}

class Size {
    constructor(price, calories) {
        this.price = price
        this.calories = calories
    }
}

class Big extends Size {
    constructor() {
        super(200, 200)
    }
}

class Little extends Size {
    constructor() {
        super(100, 100)
    }
}

class Topping {
    constructor(pizza, littlePrice, littleCalories, bigPrice, bigCalories) {
        if (pizza.size instanceof Little) {
            this.price = littlePrice
            this.calories = littleCalories
        }
        else if (pizza.size instanceof Big) {
            this.price = bigPrice
            this.calories = bigCalories
        }
    }
}

class CreamyMozzarella extends Topping {
    constructor(pizza) {
        super(pizza, 50, 20, 100, 20)
    }
}

class CheeseBoard extends Topping {
    constructor(pizza) {
        super(pizza, 150, 50, 300, 50)
    }
}

class CheddarAndParmesanCheese extends Topping {
    constructor(pizza) {
        super(pizza, 150, 50, 300, 50)
    }
}

// UI

let pizza = new Margaret(new Big()); // default pizza

document.getElementById("margaret").addEventListener("click", () => {
    pizza = new Margaret(pizza.size)
    pizza.updateUI()
});

document.getElementById("pepperoni").addEventListener("click", () => {
    pizza = new Pepperoni(pizza.size)
    pizza.updateUI()
});

document.getElementById("bavarian").addEventListener("click", () => {
    pizza = new Bavarian(pizza.size)
    pizza.updateUI()
});

document.getElementById("small").addEventListener("click", () => {
    pizza.size = new Little()
    pizza.updateUI()
});

document.getElementById("big").addEventListener("click", () => {
    pizza.size = new Big()
    pizza.updateUI()
});

document.getElementById("cheeseBoard").addEventListener("click", () => {
    const existing = pizza.getToppings().find(t => t instanceof CheeseBoard)
    existing ? pizza.removeTopping(existing) : pizza.addTopping(new CheeseBoard(pizza))
});

document.getElementById("creamyMozzarella").addEventListener("click", () => {
    const existing = pizza.getToppings().find(t => t instanceof CreamyMozzarella)
    existing ? pizza.removeTopping(existing) : pizza.addTopping(new CreamyMozzarella(pizza))
});

document.getElementById("cheddarAndParmesan").addEventListener("click", () => {
    const existing = pizza.getToppings().find(t => t instanceof CheddarAndParmesanCheese)
    existing ? pizza.removeTopping(existing) : pizza.addTopping(new CheddarAndParmesanCheese(pizza))
});

pizza.updateUI();