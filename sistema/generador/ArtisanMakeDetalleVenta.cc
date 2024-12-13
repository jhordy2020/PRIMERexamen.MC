#include <iostream>
#include <fstream>
#include <sstream>
#include <string>

#include <vector>
#include <sstream>
#include <stdexcept>

using namespace std;


// Left trim the given string ("hello! --> "hello!") 
string left_trim(string str) {
    int numStartSpaces = 0;
    for (int i = 0; i < str.length(); i++) { 
        if (!isspace(str[i])) break; 
        numStartSpaces++;
    }
    return str.substr(numStartSpaces);
}

// Right trim the given 
string right_trim(string str) {
    int numEndSpaces = 0;
    for (int i= str.length() -1; i >= 0; i--) { 
        if (!isspace(str[i])) break;
        numEndSpaces++;
    }
    return str.substr(0, str.length() - numEndSpaces);
    
}

// Left and right trim the given string ("hello! " --> "hello!") 
string trim(string str) {
    return right_trim(left_trim(str));
}


string split (const string& str, char delimiter, size_t position) { 
    vector<string> tokens;
    string token;
    istringstream tokenStream(str);
    // Dividir la cadena en tokens
    while (getline(tokenStream, token, delimiter)) {
        tokens.push_back(token);
    }
    if(position >= tokens.size() ){
        throw out_of_range("La posición está fuera de los límites del split.");
    } 
    return tokens [position];
}


// Método para escribir los elementos del arreglo en el archivo
void escribirRegistroVentas(int contarDesdeLaFila, int contador, string antesText, string despuesText, string campos[150], ofstream &outputFile) {
    // Iterar a través del arreglo comenzando desde la fila indicada
    for (int i = contarDesdeLaFila; i < contador; i++) {
        // Si es el último elemento, escribirlo sin coma al final
        if (i == contador - 1) {
            outputFile << antesText + campos[i] + despuesText << endl;
        } else {
            // Si no es el último, escribirlo con coma
            outputFile << antesText + campos[i] + despuesText + "," << endl;
        }
    }
}


void processfile(const string &inputFileName,  const string &outputFileName) {
    ifstream inputFileContador(inputFileName);  //Archivo de entrada
    ofstream outputFile(outputFileName); // Archivo de salida

    if (!inputFileContador.is_open()) {
        cerr << "no se pudo abrir el archivo de entrada: " << inputFileName << endl;
        return;
    }

    if (!outputFile.is_open()){
        cerr << "No se pudo abrir el archivo de salida: " << outputFileName <<endl;
        return;
    }


    string linea;
    string nombreModelo; //registroventas.php
    int longitud;
    int contador;
    int totallineas;

    nombreModelo = outputFileName;
    longitud=nombreModelo.length();
    nombreModelo = nombreModelo.substr(0, longitud-4);

    cout << longitud << endl;
    cout << nombreModelo << endl;

outputFile << "<?php" << endl;
outputFile << "require_once $_SERVER['DOCUMENT_ROOT'] . '/models/connect/conexion.php';" << endl;
outputFile << "" << endl;
outputFile << "// Todo lo relacionado con la base de datos para la tabla "+nombreModelo << endl;
outputFile << "class modelo"+nombreModelo << endl;
outputFile << "{ " << endl;
outputFile << "    private $conexion;" << endl;
outputFile << "" << endl;
outputFile << "    // Constructor: Obtiene la conexión a la base de datos al instanciar la clase" << endl;
outputFile << "    public function __construct()" << endl;
outputFile << "    {" << endl;
outputFile << "        $this->conexion = Conexion::obtenerConexion();" << endl;
outputFile << "    }" << endl;
outputFile << "" << endl;
outputFile << "    // Método para obtener todas las "+nombreModelo << endl;
outputFile << "    public function obtener"+nombreModelo+"(){" << endl;

outputFile << "        $query = $this->conexion->query('SELECT '." << endl;

    // query --------------------------------------------- SELECT
    int totalLineas = 0;  // Contador de líneas
    // Leer todas las líneas y contar cuántas hay
    while (getline(inputFileContador, linea)) {
        totalLineas++;  // Incrementar el contador por cada línea leída
    }


    ifstream inputFile(inputFileName);
    string campos[150];
    contador =0;
    while (getline(inputFile,linea)){
        contador++;
        if((contador>1) && (contador<totalLineas)){
            string lineaCodigo = linea;
            lineaCodigo = trim(lineaCodigo);
            lineaCodigo = split(lineaCodigo, ' ',0);
            campos[contador]=lineaCodigo;
            if(contador == totalLineas-1){
                lineaCodigo = "                                        '" + lineaCodigo+" '.";
            }else{
                lineaCodigo = "                                        '" + lineaCodigo+", '.";
            }

            // Escribir las mitades en el archivo de salida
            outputFile << lineaCodigo << endl;
        }
    }

    // end query select    
outputFile << "                                                         'FROM "+ nombreModelo +"');" << endl;

outputFile << "        return $query->fetchAll(PDO::FETCH_ASSOC);" << endl;
outputFile << "    }" << endl;
outputFile << "" << endl;


outputFile << "    // Método para insertar una nueva " + nombreModelo << endl;
outputFile << "    public function insertar"+ nombreModelo +"( " << endl;
// $Producto,
    escribirRegistroVentas(3, contador, "                                         $", "", campos, outputFile);


outputFile << "                                             )" << endl;
outputFile << "    {" << endl;
outputFile << "        $query = `INSERT INTO "+nombreModelo+" (" << endl;
//producto,
 // Llamar al método para escribir los datos
    escribirRegistroVentas(3, contador, "                                      ", "", campos, outputFile);

outputFile << ") " << endl;
outputFile << "        VALUES ( " << endl;
//:producto,
    escribirRegistroVentas(3, contador, "                :", "", campos, outputFile);

outputFile << ")`;" << endl;
outputFile << "        $stmt = $this->conexion->prepare($query);" << endl;
outputFile << "" << endl;

//$stmt->bindParam(':producto', $producto);" << endl;
    for (int i = 3; i < contador; i++) {
        // Si es el último elemento, escribirlo sin coma al final
        outputFile << "        $stmt->bindParam(\':" + campos[i] + "\', $"+campos[i]+");" << endl;        
    }

outputFile << "" << endl;
outputFile << "        return $stmt->execute();" << endl;
outputFile << "    }" << endl;
outputFile << "" << endl;
outputFile << "    // Método para eliminar una "+ nombreModelo +" por su ID" << endl;

outputFile << "    public function eliminar"+nombreModelo+"Por"+campos[2]+"($"+campos[2]+"){" << endl;

outputFile << "        $query = `DELETE FROM "+nombreModelo+" WHERE "+campos[2]+" = :"+campos[2]+" `;" << endl;
outputFile << "        $stmt = $this->conexion->prepare($query);" << endl;
outputFile << "        $stmt->bindParam(\':"+campos[2]+"\', $"+campos[2]+", PDO::PARAM_INT);" << endl;
outputFile << "" << endl;
outputFile << "        return $stmt->execute();" << endl;
outputFile << "    }" << endl;
outputFile << "" << endl;
outputFile << "    // Método para actualizar una venta" << endl;
outputFile << "    public function actualizar"+nombreModelo+"(" << endl;
 // $id, $producto, $cantidad, $descripcion, $total, $fecha
    escribirRegistroVentas(2, contador, "                                         $", "", campos, outputFile);
outputFile << " )" << endl;
outputFile << "    {" << endl;
outputFile << "        $query = `UPDATE "+nombreModelo+" " << endl;
outputFile << "                  SET  "<< endl;
//                      producto = :producto, 
    for (int i = 3; i < contador; i++) {
        // Si es el último elemento, escribirlo sin coma al final    
        if (i == contador - 1) {
        outputFile << "                  " + campos[i] + " = :"+campos[i]+"" << endl;    
        } else {
            // Si no es el último, escribirlo con coma
        outputFile << "                  " + campos[i] + " = :"+campos[i]+"," << endl;    
        }
    }

outputFile << "                  WHERE "+campos[2]+" = :"+campos[2]+"`;" << endl;
outputFile << "        $stmt = $this->conexion->prepare($query);" << endl;
outputFile << "" << endl;
// $stmt->bindParam(':id', $id, PDO::PARAM_INT);
//$stmt->bindParam(':producto', $producto);
    for (int i = 2; i < contador; i++) {
        // Si es el último elemento, escribirlo sin coma al final
        outputFile << "        $stmt->bindParam(\':" + campos[i] + "\', $"+campos[i]+");" << endl;        
    }

outputFile << "" << endl;
outputFile << "        return $stmt->execute();" << endl;
outputFile << "    }" << endl;
outputFile << "" << endl;
outputFile << "    // Método para obtener una venta por su ID" << endl;
outputFile << "    public function obtener"+nombreModelo+"PorId($id)" << endl;
outputFile << "    {" << endl;
outputFile << "        $query = `SELECT " << endl;
//id, producto, cantidad, descripcion, total, fecha 
    escribirRegistroVentas(2, contador, "              ", "", campos, outputFile);

outputFile << " FROM ventas WHERE "+campos[2]+" = :"+campos[2]+"`;"<< endl;
outputFile << "        $stmt = $this->conexion->prepare($query);" << endl;
outputFile << "        $stmt->bindParam(\':"+campos[2]+"\', $"+campos[2]+", PDO::PARAM_INT);" << endl;
outputFile << "        $stmt->execute();" << endl;
outputFile << "" << endl;
outputFile << "        return $stmt->fetch(PDO::FETCH_ASSOC); // Retorna una fila" << endl;
outputFile << "    }" << endl;
outputFile << "}" << endl;


    inputFile.close();
    outputFile.close();
}

int main(int argc, char* argv[]) {
    if (argc != 3) {
        cerr << "uso del comando ArtisanMakeModel: " << argv[0] << " <archivo_entrada> <archivo_salida>" <<endl;
        return 1;
    }
    string archivoEntrada = argv[1];
    string archivoSalida = argv[2];

    processfile(archivoEntrada, archivoSalida);

    return 0;

}
