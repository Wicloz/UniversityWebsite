import {localeModule, test} from '../qunit';
import moment from '../../moment';
localeModule('hi');

test('parse', function (assert) {
    var tests = 'जनवरी जन._फ़रवरी फ़र._मार्च मार्च_अप्रैल अप्रै._मई मई_जून जून_जुलाई जुल._अगस्त अग._सितम्बर सित._अक्टूबर अक्टू._नवम्बर नव._दिसम्बर दिस.'.split('_'), i;
    function equalTest(input, mmm, i) {
        assert.equal(moment(input, mmm).month(), i, input + ' should be month ' + (i + 1));
    }
    for (i = 0; i < 12; i++) {
        tests[i] = tests[i].split(' ');
        equalTest(tests[i][0], 'MMM', i);
        equalTest(tests[i][1], 'MMM', i);
        equalTest(tests[i][0], 'MMMM', i);
        equalTest(tests[i][1], 'MMMM', i);
        equalTest(tests[i][0].toLocaleLowerCase(), 'MMMM', i);
        equalTest(tests[i][1].toLocaleLowerCase(), 'MMMM', i);
        equalTest(tests[i][0].toLocaleUpperCase(), 'MMMM', i);
        equalTest(tests[i][1].toLocaleUpperCase(), 'MMMM', i);
    }
});

test('format', function (assert) {
    var a = [
            ['dddd, Do MMMM YYYY, a h:mm:ss बजे',  'रविवार, १४ फ़रवरी २०१०, दोपहर ३:२५:५० बजे'],
            ['ddd, a h बजे',                       'रवि, दोपहर ३ बजे'],
            ['M Mo MM MMMM MMM',                   '२ २ ०२ फ़रवरी फ़र.'],
            ['YYYY YY',                            '२०१० १०'],
            ['D Do DD',                            '१४ १४ १४'],
            ['d do dddd ddd dd',                   '० ० रविवार रवि र'],
            ['DDD DDDo DDDD',                      '४५ ४५ ०४५'],
            ['w wo ww',                            '८ ८ ०८'],
            ['h hh',                               '३ ०३'],
            ['H HH',                               '१५ १५'],
            ['m mm',                               '२५ २५'],
            ['s ss',                               '५० ५०'],
            ['a A',                                'दोपहर दोपहर'],
            ['LTS',                                'दोपहर ३:२५:५० बजे'],
            ['L',                                  '१४/०२/२०१०'],
            ['LL',                                 '१४ फ़रवरी २०१०'],
            ['LLL',                                '१४ फ़रवरी २०१०, दोपहर ३:२५ बजे'],
            ['LLLL',                               'रविवार, १४ फ़रवरी २०१०, दोपहर ३:२५ बजे'],
            ['l',                                  '१४/२/२०१०'],
            ['ll',                                 '१४ फ़र. २०१०'],
            ['lll',                                '१४ फ़र. २०१०, दोपहर ३:२५ बजे'],
            ['llll',                               'रवि, १४ फ़र. २०१०, दोपहर ३:२५ बजे']
        ],
        b = moment(new Date(2010, 1, 14, 15, 25, 50, 125)),
        i;
    for (i = 0; i < a.length; i++) {
        assert.equal(b.format(a[i][0]), a[i][1], a[i][0] + ' ---> ' + a[i][1]);
    }
});

test('format ordinal', function (assert) {
    assert.equal(moment([2011, 0, 1]).format('DDDo'), '१', '१');
    assert.equal(moment([2011, 0, 2]).format('DDDo'), '२', '२');
    assert.equal(moment([2011, 0, 3]).format('DDDo'), '३', '३');
    assert.equal(moment([2011, 0, 4]).format('DDDo'), '४', '४');
    assert.equal(moment([2011, 0, 5]).format('DDDo'), '५', '५');
    assert.equal(moment([2011, 0, 6]).format('DDDo'), '६', '६');
    assert.equal(moment([2011, 0, 7]).format('DDDo'), '७', '७');
    assert.equal(moment([2011, 0, 8]).format('DDDo'), '८', '८');
    assert.equal(moment([2011, 0, 9]).format('DDDo'), '९', '९');
    assert.equal(moment([2011, 0, 10]).format('DDDo'), '१०', '१०');

    assert.equal(moment([2011, 0, 11]).format('DDDo'), '११', '११');
    assert.equal(moment([2011, 0, 12]).format('DDDo'), '१२', '१२');
    assert.equal(moment([2011, 0, 13]).format('DDDo'), '१३', '१३');
    assert.equal(moment([2011, 0, 14]).format('DDDo'), '१४', '१४');
    assert.equal(moment([2011, 0, 15]).format('DDDo'), '१५', '१५');
    assert.equal(moment([2011, 0, 16]).format('DDDo'), '१६', '१६');
    assert.equal(moment([2011, 0, 17]).format('DDDo'), '१७', '१७');
    assert.equal(moment([2011, 0, 18]).format('DDDo'), '१८', '१८');
    assert.equal(moment([2011, 0, 19]).format('DDDo'), '१९', '१९');
    assert.equal(moment([2011, 0, 20]).format('DDDo'), '२०', '२०');

    assert.equal(moment([2011, 0, 21]).format('DDDo'), '२१', '२१');
    assert.equal(moment([2011, 0, 22]).format('DDDo'), '२२', '२२');
    assert.equal(moment([2011, 0, 23]).format('DDDo'), '२३', '२३');
    assert.equal(moment([2011, 0, 24]).format('DDDo'), '२४', '२४');
    assert.equal(moment([2011, 0, 25]).format('DDDo'), '२५', '२५');
    assert.equal(moment([2011, 0, 26]).format('DDDo'), '२६', '२६');
    assert.equal(moment([2011, 0, 27]).format('DDDo'), '२७', '२७');
    assert.equal(moment([2011, 0, 28]).format('DDDo'), '२८', '२८');
    assert.equal(moment([2011, 0, 29]).format('DDDo'), '२९', '२९');
    assert.equal(moment([2011, 0, 30]).format('DDDo'), '३०', '३०');

    assert.equal(moment([2011, 0, 31]).format('DDDo'), '३१', '३१');
});

test('format month', function (assert) {
    var expected = 'जनवरी जन._फ़रवरी फ़र._मार्च मार्च_अप्रैल अप्रै._मई मई_जून जून_जुलाई जुल._अगस्त अग._सितम्बर सित._अक्टूबर अक्टू._नवम्बर नव._दिसम्बर दिस.'.split('_'), i;
    for (i = 0; i < expected.length; i++) {
        assert.equal(moment([2011, i, 1]).format('MMMM MMM'), expected[i], expected[i]);
    }
});

test('format week', function (assert) {
    var expected = 'रविवार रवि र_सोमवार सोम सो_मंगलवार मंगल मं_बुधवार बुध बु_गुरूवार गुरू गु_शुक्रवार शुक्र शु_शनिवार शनि श'.split('_'), i;
    for (i = 0; i < expected.length; i++) {
        assert.equal(moment([2011, 0, 2 + i]).format('dddd ddd dd'), expected[i], expected[i]);
    }
});

test('from', function (assert) {
    var start = moment([2007, 1, 28]);
    assert.equal(start.from(moment([2007, 1, 28]).add({s: 44}), true),  'कुछ ही क्षण', '44 seconds = a few seconds');
    assert.equal(start.from(moment([2007, 1, 28]).add({s: 45}), true),  'एक मिनट',      '45 seconds = a minute');
    assert.equal(start.from(moment([2007, 1, 28]).add({s: 89}), true),  'एक मिनट',      '89 seconds = a minute');
    assert.equal(start.from(moment([2007, 1, 28]).add({s: 90}), true),  '२ मिनट',     '90 seconds = 2 minutes');
    assert.equal(start.from(moment([2007, 1, 28]).add({m: 44}), true),  '४४ मिनट',    '44 minutes = 44 minutes');
    assert.equal(start.from(moment([2007, 1, 28]).add({m: 45}), true),  'एक घंटा',       '45 minutes = an hour');
    assert.equal(start.from(moment([2007, 1, 28]).add({m: 89}), true),  'एक घंटा',       '89 minutes = an hour');
    assert.equal(start.from(moment([2007, 1, 28]).add({m: 90}), true),  '२ घंटे',       '90 minutes = 2 hours');
    assert.equal(start.from(moment([2007, 1, 28]).add({h: 5}), true),   '५ घंटे',       '5 hours = 5 hours');
    assert.equal(start.from(moment([2007, 1, 28]).add({h: 21}), true),  '२१ घंटे',      '21 hours = 21 hours');
    assert.equal(start.from(moment([2007, 1, 28]).add({h: 22}), true),  'एक दिन',         '22 hours = a day');
    assert.equal(start.from(moment([2007, 1, 28]).add({h: 35}), true),  'एक दिन',         '35 hours = a day');
    assert.equal(start.from(moment([2007, 1, 28]).add({h: 36}), true),  '२ दिन',        '36 hours = 2 days');
    assert.equal(start.from(moment([2007, 1, 28]).add({d: 1}), true),   'एक दिन',         '1 day = a day');
    assert.equal(start.from(moment([2007, 1, 28]).add({d: 5}), true),   '५ दिन',        '5 days = 5 days');
    assert.equal(start.from(moment([2007, 1, 28]).add({d: 25}), true),  '२५ दिन',       '25 days = 25 days');
    assert.equal(start.from(moment([2007, 1, 28]).add({d: 26}), true),  'एक महीने',       '26 days = a month');
    assert.equal(start.from(moment([2007, 1, 28]).add({d: 30}), true),  'एक महीने',       '30 days = a month');
    assert.equal(start.from(moment([2007, 1, 28]).add({d: 43}), true),  'एक महीने',       '43 days = a month');
    assert.equal(start.from(moment([2007, 1, 28]).add({d: 46}), true),  '२ महीने',      '46 days = 2 months');
    assert.equal(start.from(moment([2007, 1, 28]).add({d: 74}), true),  '२ महीने',      '75 days = 2 months');
    assert.equal(start.from(moment([2007, 1, 28]).add({d: 76}), true),  '३ महीने',      '76 days = 3 months');
    assert.equal(start.from(moment([2007, 1, 28]).add({M: 1}), true),   'एक महीने',       '1 month = a month');
    assert.equal(start.from(moment([2007, 1, 28]).add({M: 5}), true),   '५ महीने',      '5 months = 5 months');
    assert.equal(start.from(moment([2007, 1, 28]).add({d: 345}), true), 'एक वर्ष',        '345 days = a year');
    assert.equal(start.from(moment([2007, 1, 28]).add({d: 548}), true), '२ वर्ष',       '548 days = 2 years');
    assert.equal(start.from(moment([2007, 1, 28]).add({y: 1}), true),   'एक वर्ष',        '1 year = a year');
    assert.equal(start.from(moment([2007, 1, 28]).add({y: 5}), true),   '५ वर्ष',       '5 years = 5 years');
});

test('suffix', function (assert) {
    assert.equal(moment(30000).from(0), 'कुछ ही क्षण में',  'prefix');
    assert.equal(moment(0).from(30000), 'कुछ ही क्षण पहले', 'suffix');
});

test('now from now', function (assert) {
    assert.equal(moment().fromNow(), 'कुछ ही क्षण पहले',  'now from now should display as in the past');
});

test('fromNow', function (assert) {
    assert.equal(moment().add({s: 30}).fromNow(), 'कुछ ही क्षण में', 'कुछ ही क्षण में');
    assert.equal(moment().add({d: 5}).fromNow(), '५ दिन में', '५ दिन में');
});

test('calendar day', function (assert) {
    var a = moment().hours(2).minutes(0).seconds(0);

    assert.equal(moment(a).calendar(),                     'आज रात २:०० बजे',     'today at the same time');
    assert.equal(moment(a).add({m: 25}).calendar(),      'आज रात २:२५ बजे',     'Now plus 25 min');
    assert.equal(moment(a).add({h: 3}).calendar(),       'आज सुबह ५:०० बजे',     'Now plus 3 hour');
    assert.equal(moment(a).add({d: 1}).calendar(),       'कल रात २:०० बजे',  'tomorrow at the same time');
    assert.equal(moment(a).subtract({h: 1}).calendar(),  'आज रात १:०० बजे',     'Now minus 1 hour');
    assert.equal(moment(a).subtract({d: 1}).calendar(),  'कल रात २:०० बजे', 'yesterday at the same time');
});

test('calendar next week', function (assert) {
    var i, m;
    for (i = 2; i < 7; i++) {
        m = moment().add({d: i});
        assert.equal(m.calendar(),       m.format('dddd[,] LT'),  'Today + ' + i + ' days current time');
        m.hours(0).minutes(0).seconds(0).milliseconds(0);
        assert.equal(m.calendar(),       m.format('dddd[,] LT'),  'Today + ' + i + ' days beginning of day');
        m.hours(23).minutes(59).seconds(59).milliseconds(999);
        assert.equal(m.calendar(),       m.format('dddd[,] LT'),  'Today + ' + i + ' days end of day');
    }
});

test('calendar last week', function (assert) {
    var i, m;

    for (i = 2; i < 7; i++) {
        m = moment().subtract({d: i});
        assert.equal(m.calendar(),       m.format('[पिछले] dddd[,] LT'),  'Today - ' + i + ' days current time');
        m.hours(0).minutes(0).seconds(0).milliseconds(0);
        assert.equal(m.calendar(),       m.format('[पिछले] dddd[,] LT'),  'Today - ' + i + ' days beginning of day');
        m.hours(23).minutes(59).seconds(59).milliseconds(999);
        assert.equal(m.calendar(),       m.format('[पिछले] dddd[,] LT'),  'Today - ' + i + ' days end of day');
    }
});

test('calendar all else', function (assert) {
    var weeksAgo = moment().subtract({w: 1}),
        weeksFromNow = moment().add({w: 1});

    assert.equal(weeksAgo.calendar(),       weeksAgo.format('L'),  '1 week ago');
    assert.equal(weeksFromNow.calendar(),   weeksFromNow.format('L'),  'in 1 week');

    weeksAgo = moment().subtract({w: 2});
    weeksFromNow = moment().add({w: 2});

    assert.equal(weeksAgo.calendar(),       weeksAgo.format('L'),  '2 weeks ago');
    assert.equal(weeksFromNow.calendar(),   weeksFromNow.format('L'),  'in 2 weeks');
});

test('meridiem', function (assert) {
    assert.equal(moment([2011, 2, 23,  2, 30]).format('a'), 'रात', 'before dawn');
    assert.equal(moment([2011, 2, 23,  9, 30]).format('a'), 'सुबह', 'morning');
    assert.equal(moment([2011, 2, 23, 14, 30]).format('a'), 'दोपहर', 'during day');
    assert.equal(moment([2011, 2, 23, 17, 30]).format('a'), 'शाम', 'evening');
    assert.equal(moment([2011, 2, 23, 19, 30]).format('a'), 'शाम', 'late evening');
    assert.equal(moment([2011, 2, 23, 21, 20]).format('a'), 'रात', 'night');

    assert.equal(moment([2011, 2, 23,  2, 30]).format('A'), 'रात', 'before dawn');
    assert.equal(moment([2011, 2, 23,  9, 30]).format('A'), 'सुबह', 'morning');
    assert.equal(moment([2011, 2, 23, 14, 30]).format('A'), 'दोपहर', ' during day');
    assert.equal(moment([2011, 2, 23, 17, 30]).format('A'), 'शाम', 'evening');
    assert.equal(moment([2011, 2, 23, 19, 30]).format('A'), 'शाम', 'late evening');
    assert.equal(moment([2011, 2, 23, 21, 20]).format('A'), 'रात', 'night');
});

test('weeks year starting sunday formatted', function (assert) {
    assert.equal(moment([2012, 0,  1]).format('w ww wo'), '१ ०१ १', 'Jan  1 2012 should be week 1');
    assert.equal(moment([2012, 0,  7]).format('w ww wo'), '१ ०१ १', 'Jan  7 2012 should be week 1');
    assert.equal(moment([2012, 0,  8]).format('w ww wo'), '२ ०२ २', 'Jan  8 2012 should be week 2');
    assert.equal(moment([2012, 0, 14]).format('w ww wo'), '२ ०२ २', 'Jan 14 2012 should be week 2');
    assert.equal(moment([2012, 0, 15]).format('w ww wo'), '३ ०३ ३', 'Jan 15 2012 should be week 3');
});

