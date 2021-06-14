import { useSelector } from 'react-redux';
import usePHPDebugExtension from './usePHPDebugExtension';

const useCurrentPHPDebugExtension = () => {
	const name = useSelector( state => state.environment.php.current_debug_extension );
	return usePHPDebugExtension( name );
};

export default useCurrentPHPDebugExtension;
