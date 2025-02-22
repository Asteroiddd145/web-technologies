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
    }
    
    removeTopping(topping) {
        this.toppings = this.toppings.filter(t => t != topping)
    }

    calculatePrice() {
        return this.price + this.size.price + this.toppings.reduce((sum, t) => sum + t.price, 0)
    }
    calculateCalories() {
        return this.calories + this.size.calories + this.toppings.reduce((sum, t) => sum + t.calories, 0)
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



let pizza = new Margaret(new Big())

console.log("Базовая цена:", pizza.calculatePrice())
console.log("Базовая калорийность:", pizza.calculateCalories())

pizza.addTopping(new CreamyMozzarella(pizza))
pizza.addTopping(new CheeseBoard(pizza))

// let topping = new CheddarAndParmesanCheese(pizza)
// pizza.addTopping(topping)
// pizza.removeTopping(topping)

console.log("Цена с добавками:", pizza.calculatePrice())
console.log("Калорийность с добавками:", pizza.calculateCalories())