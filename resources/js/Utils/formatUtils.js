import dayjs from 'dayjs';

const formatDate = (dateString) => {
    const date = dayjs(dateString);
    // Then specify how you want your dates to be formatted
    if (!date.isValid()) {
        return '';
    }
    return date.format('DD/MM/YYYY');
};
const formatDateTime = (dateString) => {
    const date = dayjs(dateString);
    if (!date.isValid()) {
        return '';
    }
    // Then specify how you want your dates to be formatted
    return `${date.format('DD/MM/YYYY')} ${date.format('HH:mm')}`;
};

const formatPrice = (price) => {
    const priceFloat = parseFloat(price);
    if (isNaN(priceFloat)) {
        return '- €';
    }
    return priceFloat.toLocaleString('fr-FR', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2,
    } ) + ' €';
};

const formatDecimal = (price) => {
    let priceFloat = parseFloat(price);
    if (isNaN(priceFloat)) {
        priceFloat = 0;
    }
    return priceFloat.toFixed(2);
};

const roundToDecimals = (price, decimals) => {
    let priceFloat = parseFloat(price);
    if (isNaN(priceFloat)) {
        priceFloat = 0;
    }
    return parseFloat(priceFloat.toFixed(decimals));
};

export { formatDate, formatDateTime, formatPrice, formatDecimal, roundToDecimals };
