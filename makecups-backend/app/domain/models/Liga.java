/*
The MIT License (MIT)

Copyright (c) 2015 Bluewolf Team

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
*/
package domain.models;

import ddd.easy.ValueObject;

public class Liga implements ValueObject {
    private final String nome;
    private final String pais;
    private final String continente;

    public Liga(String nome, String pais, String continente) {
        this.nome = nome;
        this.pais = pais;
        this.continente = continente;
    }

    public String getNome() {
        return nome;
    }

    public String getPais() {
        return pais;
    }

    public String getContinente() {
        return continente;
    }

    @Override
    public boolean equals(Object o) {
        if (this == o) return true;
        if (o == null || getClass() != o.getClass()) return false;

        Liga liga = (Liga) o;

        if (continente != null ? !continente.equals(liga.continente) : liga.continente != null) return false;
        if (nome != null ? !nome.equals(liga.nome) : liga.nome != null) return false;
        if (pais != null ? !pais.equals(liga.pais) : liga.pais != null) return false;

        return true;
    }

    @Override
    public int hashCode() {
        int result = nome != null ? nome.hashCode() : 0;
        result = 31 * result + (pais != null ? pais.hashCode() : 0);
        result = 31 * result + (continente != null ? continente.hashCode() : 0);
        return result;
    }
}
