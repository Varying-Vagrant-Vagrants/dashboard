import { useSelector } from 'react-redux';

const useTools = () => useSelector( state => state.tools );

export default useTools;
