$(document).ready(function () {
    $('#generator').click(function(){

        // takes value from each boxes
        var box1 = $('#box1').val().split('\n');
        var box2 = $('#box2').val().split('\n');
        var box3 = $('#box3').val().split('\n');
        var option = $('#option').val();

        //each value goes into function generateKeyword
        var result = generateKeyword(box1, box2, box3, option);

        //join & display result taken from generateKeyword
        $('#permutation-textarea-result').val(result.join('\n'))

        //count keyword from result
        $('#count-keyword').text(result.length)
    })

    function generateKeyword(box1, box2, box3, option) {

            var keywords = []

            //pushing box value into array
            box1.forEach(i => {
                box2.forEach(j => {
                    box3.forEach(k => {
                        //normal result
                        if (option == 'normal') {
                            keywords.push(i+' '+j+' '+k);
                        } else if (option == 'quotes') {
                            //result with quote marks
                            keywords.push(`"` + i + ' ' + j + ' ' + k + `"`)
                        } else {
                            //result with brackets
                            keywords.push(`[` + i + ' ' + j + ' ' + k + `]`)
                        }
                    })
                })
            })
            return keywords
    }

    //count keywords for boxes
    $('#box1').keyup(function() {
        var box1 = $(this).val().split('\n')
        if(!$(this).val()) {
            return $('#count-keyword-box1').text(0)
        }
        $('#count-keyword-box1').text(box1.length)
    })

    $('#box2').keyup(function() {
        var box2 = $(this).val().split('\n')
        if(!$(this).val()) {
            return $('#count-keyword-box2').text(0)
        }
        $('#count-keyword-box2').text(box2.length)
    })

    $('#box3').keyup(function() {
        var box3 = $(this).val().split('\n')
        if(!$(this).val()) {
            return $('#count-keyword-box3').text(0)
        }
        $('#count-keyword-box3').text(box3.length)
    })
})

$("#copy-text").click(function () {
    const textarea = $('#permutation-textarea-result');
    textarea.select();
    document.execCommand("copy");
    toastr.success('Copied to Clipboard', 'Information');
});
$("#reset").click(function () {
    const textarea = $('#permutation-textarea-result');
    const box1 = $('#box1');
    const box2 = $('#box2');
    const box3 = $('#box3');
    const counter1 = $('#count-keyword-box1');
    const counter2 = $('#count-keyword-box2');
    const counter3 = $('#count-keyword-box3');
    const counterResult = $('#count-keyword');
    textarea.val('');
    box1.val('');
    box2.val('');
    box3.val('');
    counter1.text(0);
    counter2.text(0);
    counter3.text(0);
    counterResult.text(0);
});
