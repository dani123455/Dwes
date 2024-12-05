<?php

// Clase base abstracta vhiculo
abstract class Vehiculo {
    protected string $marca;
    protected string $modelo;
    protected string $color;

    public function __construct(string $marca, string $modelo, string $color = "Negro") {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->color = $color;
    }

    abstract public function mover();
    abstract public function detener();

    public function obtenerInformacion(): string {
        return "Marca: {$this->marca}, Modelo: {$this->modelo}, Color: {$this->color}";
    }

    public function __toString(): string {
        return $this->obtenerInformacion();
    }

    public function __get(string $name) {
        if (property_exists($this, $name)) {
            return $this->$name;
        }
        return null;
    }
}

// Clase Coche
class Coche extends Vehiculo {
    private int $numeroPuertas;

    public function __construct(string $marca, string $modelo, int $numeroPuertas, string $color = "Negro") {
        parent::__construct($marca, $modelo, $color);
        $this->numeroPuertas = $numeroPuertas;
    }

    public function mover() {
        return "El coche se está moviendo.";
    }

    public function detener() {
        return "El coche se ha detenido.";
    }

    public function obtenerInformacion(): string {
        return parent::obtenerInformacion() . ", Número de puertas: {$this->numeroPuertas}";
    }

    public function getNumeroPuertas(): int {
        return $this->numeroPuertas;
    }

    public function setNumeroPuertas(int $numeroPuertas): self {
        $this->numeroPuertas = $numeroPuertas;
        return $this;
    }
}

// Clase Moto
class Moto extends Vehiculo {
    private int $cilindrada;

    public function __construct(string $marca, string $modelo, int $cilindrada, string $color = "Negro") {
        parent::__construct($marca, $modelo, $color);
        $this->cilindrada = $cilindrada;
    }

    public function mover() {
        return "La moto se está moviendo.";
    }

    public function detener() {
        return "La moto se ha detenido.";
    }

    public function obtenerInformacion(): string {
        return parent::obtenerInformacion() . ", Cilindrada: {$this->cilindrada}cc";
    }

    public function getCilindrada(): int {
        return $this->cilindrada;
    }

    public function setCilindrada(int $cilindrada): self {
        $this->cilindrada = $cilindrada;
        return $this;
    }
}

// Clase Camión
class Camion extends Vehiculo {
    private float $capacidadCarga;

    public function __construct(string $marca, string $modelo, float $capacidadCarga, string $color = "Negro") {
        parent::__construct($marca, $modelo, $color);
        $this->capacidadCarga = $capacidadCarga;
    }

    public function mover() {
        return "El camión se está moviendo.";
    }

    public function detener() {
        return "El camión se ha detenido.";
    }

    public function obtenerInformacion(): string {
        return parent::obtenerInformacion() . ", Capacidad de carga: {$this->capacidadCarga} toneladas";
    }

    public function getCapacidadCarga(): float {
        return $this->capacidadCarga;
    }

    public function setCapacidadCarga(float $capacidadCarga): self {
        $this->capacidadCarga = $capacidadCarga;
        return $this;
    }
}

// Clase final Bicicleta
final class Bicicleta {
    public function pedalear() {
        return "La bicicleta está pedaleando.";
    }
}

// Interfaz VehiculoElectrico
interface VehiculoElectrico {
    public function cargarBateria();
    public function estadoBateria(): string;
}

// Clase Tesla que implementa VehiculoElectrico
class Tesla extends Vehiculo implements VehiculoElectrico {
    private int $nivelBateria;

    public function __construct(string $marca, string $modelo, int $nivelBateria, string $color = "Negro") {
        parent::__construct($marca, $modelo, $color);
        $this->nivelBateria = $nivelBateria;
    }

    public function mover() {
        return "El Tesla se está moviendo.";
    }

    public function detener() {
        return "El Tesla se ha detenido.";
    }

    public function obtenerInformacion(): string {
        return parent::obtenerInformacion() . ", Nivel de batería: {$this->nivelBateria}%";
    }

    public function cargarBateria() {
        $this->nivelBateria = 100;
    }

    public function estadoBateria(): string {
        return "Nivel de batería: {$this->nivelBateria}%";
    }

    public function getNivelBateria(): int {
        return $this->nivelBateria;
    }

    public function setNivelBateria(int $nivelBateria): self {
        $this->nivelBateria = $nivelBateria;
        return $this;
    }
}

// Clase Concesionario
class Concesionario {
    public function mostrarVehiculo(Vehiculo $vehiculo) {
        echo $vehiculo->obtenerInformacion();
    }
}

// Ejemplo de uso
$concesionario = new Concesionario();
$coche = new Coche("Toyota", "Corolla", 4);
$moto = new Moto("Yamaha", "MT-07", 689);
$camion = new Camion("Mercedes", "Actros", 18.0);
$tesla = new Tesla("Tesla", "Model S", 85);

$concesionario->mostrarVehiculo($coche);
echo "\n";
$concesionario->mostrarVehiculo($moto);
echo "\n";
$concesionario->mostrarVehiculo($camion);
echo "\n";
$concesionario->mostrarVehiculo($tesla);
echo "\n";

//Modificación de parámetros con métodos encadenados
$coche->setNumeroPuertas(5)->setNumeroPuertas(3);
echo $coche->obtenerInformacion();
?>