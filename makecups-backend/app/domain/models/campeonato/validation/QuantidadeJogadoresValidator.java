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
package domain.models.campeonato.validation;

import ddd.easy.exceptions.InvalidEntityException;
import ddd.easy.validation.ChainValidator;
import ddd.easy.validation.Validator;
import domain.models.campeonato.Campeonato;
import domain.models.campeonato.exceptions.CampeonatoInvalidoException;

public class QuantidadeJogadoresValidator extends ChainValidator<Campeonato>{

    public QuantidadeJogadoresValidator(Validator<Campeonato> next) {
        super(next);
    }

    @Override
    public void validate(Campeonato campeonato) throws InvalidEntityException {
        if(campeonato.sizeJogadores() < 2) {
            throw new CampeonatoInvalidoException("Quantidade minima de jogadores inválido");
        }
        super.validate(campeonato);
    }
}
