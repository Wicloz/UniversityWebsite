#include <iostream>
#include <fstream>
#include <string>
using namespace std;

string leesTotSequentie (ifstream& file, char sequentie[]) {
    string read = ""; // Return string
    // Waarden om status te volgen
    int currentMatch = 0;
    bool sequenceFound = false;

    // Lees de file om deze sectie te verkrijgen
    char kar = file.get();
    while (!file.eof()) {
        if (currentMatch == 10)
            sequenceFound = true;

        // Kijk of het huidig karakter de volgende is van de sequentie
        if (kar == sequentie[currentMatch])
            currentMatch++;
        else
            currentMatch = 0;

        // Voeg karakter aan return toe
        read += kar;

        // Stop zodra de sequentie is gevonden
        if (sequenceFound)
            break;

        kar = file.get();
    }

    return read;
}//leesTotSequentie

string leesTotEindBestand (ifstream& file) {
    string read = ""; // Return string

    char kar = file.get();
    while (!file.eof()) {
        read += kar;
        kar = file.get();
    }

    return read;
}//leesTotEindBestand

string leesTotBeginHeader (ifstream& file) {
    char headerBegin[] {'<', '!', '-', '-', 's', 'd', 'h', '-', '-', '>'};
    return leesTotSequentie(file, headerBegin);
}//leesTotBeginHeader

string leesTotEindHeader (ifstream& file) {
    char headerEnd[] {'<', '!', '-', '-', 'e', 'd', 'h', '-', '-', '>'};
    return leesTotSequentie(file, headerEnd);
}//leesTotEindHeader

string leesTotBeginFooter (ifstream& file) {
    char footerBegin[] {'<', '!', '-', '-', 's', 'd', 'f', '-', '-', '>'};
    return leesTotSequentie(file, footerBegin);
}//leesTotBeginFooter

string leesTotEindFooter (ifstream& file) {
    char footerEnd[] {'<', '!', '-', '-', 'e', 'd', 'f', '-', '-', '>'};
    return leesTotSequentie(file, footerEnd);
}//leesTotEindFooter

void synchroniseerNaarBestand (string filename, string header, string footer, bool vak) {
    // Open output file voor lezen
    string filepath = "./../" + filename;
    ifstream outputIn (filepath.c_str(), ios::in);

    // Maak de secties
    string section1 = leesTotBeginHeader(outputIn);
    leesTotEindHeader(outputIn);
    string section3 = leesTotBeginFooter(outputIn);
    leesTotEindFooter(outputIn);
    string section5 = leesTotEindBestand(outputIn);

    // Sluit output file
    outputIn.close();

    // Bewerk header
    string findString = "<li><a href=\"" + filename + "\">";
    string toString = "<li class=\"active\"><a href=\"" + filename + "\">";
    header.replace(header.find(findString), findString.length(), toString);

    if (vak) {
        string findString = "<li class=\"dropdown\">";
        string toString = "<li class=\"dropdown active\">";
        header.replace(header.find(findString), findString.length(), toString);
    }

    cout << filename << endl;

    // Stop output in output bestand
    ofstream outputOut (filepath.c_str(), ios::out);
    outputOut << section1 << header << section3 << footer << section5;
    outputOut.close();
}//synchroniseerNaarBestand

int main() {
     // Open index file om te lezen
    ifstream index ("./../index.php", ios::in);
    // Vind de header
    leesTotBeginHeader(index);
    string header = leesTotEindHeader(index);
    // Vind de footer
    leesTotBeginFooter(index);
    string footer = leesTotEindFooter(index);
    // Sluit input file
    index.close();
    // Bewerk de header
    header.replace(header.find("<li class=\"active\">"), sizeof("<li class=\"active\">")-1, "<li>");

    synchroniseerNaarBestand ("vak_bp.php", header, footer, true);
    synchroniseerNaarBestand ("vak_fi1.php", header, footer, true);
    synchroniseerNaarBestand ("vak_mg.php", header, footer, true);
    synchroniseerNaarBestand ("vak_pm.php", header, footer, true);
    synchroniseerNaarBestand ("vak_stpr.php", header, footer, true);

    synchroniseerNaarBestand ("tentamens.php", header, footer, false);
    synchroniseerNaarBestand ("deadlines.php", header, footer, false);
    synchroniseerNaarBestand ("links.php", header, footer, false);
    synchroniseerNaarBestand ("contact.php", header, footer, false);
    synchroniseerNaarBestand ("rooster.php", header, footer, false);
    synchroniseerNaarBestand ("login.php", header, footer, false);

    return 0;
}
