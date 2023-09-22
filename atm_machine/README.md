# Iteration 1

Business rules:

We want to build an ATM machine and the first thing we need to do, is to create the software that will breakdown which bills (notes) and coins to give you when you are trying to make a withdrawal.

The content of the ATM is:

| Value | Type |
|-------|------|
| 500   | bill |
| 200   | bill |
| 100   | bill |
| 50    | bill |
| 20    | bill |
| 10    | bill |
| 5     | bill |
| 2     | coin |
| 1     | coin |

Example
Input:

As a user
I withdraw 434€

Output:

2 bills of 200.
1 bill of 20.
1 bill of 10.
2 coins of 2.

Possible API for the ATM

Primitive Obsession and tight couple to the presentation

``` 
public interface ATM {
public String withdraw(int quantity);
}
```

Returning list of DTO or Value Objects
```
public interface ATM {
public List<Money> withdraw(int quantity);
}
```

Outside-in
```
public interface ATM {
public void withdraw(int quantity);
}
```
