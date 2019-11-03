# Flujo de trabajo

Este proyecto cuenta con dos ramas principales: **Master** y **dev**

## Master

Codigo estable y testeado.

## Dev

Puede contener codigo no testeado y que aun este siendo desarrollado


## Ramas y trabajos

Para desarrollar una nueva caracteristica se tendra que realiza una nueva rama 
desde **dev**. Y cuando se crea conveniente, se volvera a fucionar con ***dev***.
Si todo esta en su correcto orden y no rompe la estructura ya armada en ***dev*** 
y ademas es codigo estable, se puede fucionar con ***master***.

### Ejemplo de ramas

    *carac/modelo*, puede ser un ejemplo de ello. Y su ves, se puede tener otra
    rama donde se trabaja otra caracteristica. Por ejemplo:
    
    *carac/config*

De esta forma, se tiene un mejor flujo de trabajo.

# Comandos utiles

- git fetch :: *Para actualizar repositorio en computadora propia*

- git merge :: *Para fucionar una rama con otra*

- git remote -a -v :: *Para mostrar todas las direcciones de los repositorios remotos*

- git remote add *"nombre identificador"* *"direccion"* :: 
*Para agregar un repositorio externo*
  
- git log :: *Muestras los commits realizados en la rama actual*

- git --all 



